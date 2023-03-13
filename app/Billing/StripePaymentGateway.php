<?php

declare(strict_types=1);

namespace App\Billing;

use App\Models\User;
use Illuminate\Support\Str;

class StripePaymentGateway implements PaymentGatewayInterface
{
    public function getUser(array $attributes): User
    {
        // TODO - move to user repository

        $user = User::firstOrCreate(
            [
                'email' => $attributes['email']
            ],
            [
                'password' => Str::random(12),
                'name' => $attributes['first_name'] . ' ' . $attributes['last_name'],
                'address' => $attributes['address'],
                'city' => $attributes['city'],
                'county' => $attributes['county'],
                'postcode' => $attributes['postcode']
            ]
        );

        $paymentMethod = json_decode($attributes['paymentMethod'], true);

        if (!$user->stripe_id) {
            $user->createOrGetStripeCustomer();
        }

        $user->pm_last_four = $paymentMethod["card"]["last4"];
        $user->pm_type = $paymentMethod["card"]["brand"];
        $user->save();

        return $user;
    }

    public function subscribe(User $user, Cart $cart): string
    {
        $subscription = $user->newSubscription(
            'Subscription',
            $cart->getSubscriptionItems()->map(function (CartItem $cartItem) {
                return $cartItem->getSku()->stripe_price_id;
            })->toArray()
        );

        foreach ($cart->getSubscriptionItems() as $cartItem) {
            $subscription->quantity($cartItem->getQuantity(), $cartItem->getSku()->stripe_price_id);
        }

        $nonSubscriptionItems = [];
        foreach ($cart->getNonSubscriptionItems() as $cartItem) {
            $nonSubscriptionItems[] = [
                'price' => $cartItem->getSku()->stripe_price_id,
                'quantity' => $cartItem->getQuantity()
            ];
        }

        if ($cart->getShippingMethod()) {
            $nonSubscriptionItems[] = [
                'price' => $cart->getShippingMethod()->stripe_price_id,
                'quantity' => 1
            ];
        }

        $subscription = $subscription->create($cart->getPaymentMethodId(), [
                'name' => $user->name,
                'email' => $user->email
            ],
            [
                'add_invoice_items' => $nonSubscriptionItems,
                'payment_behavior' => 'error_if_incomplete',
            ]
        );

        return $subscription->latestPayment()->id;
    }

    public function charge(User $user, Cart $cart): string
    {
        $user->updateDefaultPaymentMethod($cart->getPaymentMethodId());
        $user->charge(($cart->getTotal()) * 100, $cart->getPaymentMethodId());

        foreach ($cart->getNonSubscriptionItems() as $cartItem) {
            $user->tabPrice($cartItem->getSku()->stripe_price_id, $cartItem->getQuantity());
        }

        if ($cart->getShippingMethod()) {
            $user->tabPrice($cart->getShippingMethod()->stripe_price_id, 1);
        }

        return $user->invoice()->payment_intent;
    }
}
