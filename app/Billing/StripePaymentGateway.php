<?php

declare(strict_types=1);

namespace App\Billing;

use App\Models\User;
use Illuminate\Support\Str;

class StripePaymentGateway implements PaymentGatewayInterface
{
    public function getUser(array $attributes): User
    {
        $user = User::firstOrCreate(
            [
                'email' => $attributes['email']
            ],
            [
                'password' => Str::random(12),
                'name' => $attributes['first_name'] . ' ' . $attributes['last_name'],
                'address' => $attributes['address'],
                'city' => $attributes['city'],
                'state' => $attributes['state'],
                'zip_code' => $attributes['zip_code']
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

    public function subscribe($user, $sku, $quantity, $paymentMethodId): string
    {
        $subscription = $user->newSubscription($sku->name, $sku->stripe_price_id)
            ->quantity($quantity)
            ->create($paymentMethodId, [
                'email' => $user->email
            ], [
                'payment_behavior' => 'error_if_incomplete',
                'default_tax_rates' => $sku->stripe_tax_rate_id,

            ]);
        return $subscription->latestPayment()->id;
    }

    public function charge($user, $paymentMethodId, $amount): string
    {
        $payment = $user->charge(
            $amount,
            $paymentMethodId,
            ['setup_future_usage' => 'off_session']
        );
        return $payment->id;
    }
}
