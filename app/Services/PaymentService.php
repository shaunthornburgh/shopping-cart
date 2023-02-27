<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Package;
use App\Models\Sku;
use App\Models\User;
use Illuminate\Support\Str;

class PaymentService
{
    public function getUser($request)
    {
        $user = User::firstOrCreate(
            [
                'email' => $request->input('email')
            ],
            [
                'password' => Str::random(12),
                'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'zip_code' => $request->input('zip_code')
            ]
        );

        $paymentMethod = json_decode($request->input('paymentMethod'), true);

        // Save Stripe information to user
        if (!$user->stripe_id) {
            $user->createOrGetStripeCustomer();
        }

        $user->pm_last_four = $paymentMethod["card"]["last4"];
        $user->pm_type = $paymentMethod["card"]["brand"];
        $user->save();

        return $user;
    }

    public function createOrder($request)
    {
        $user = $this->getUser($request);

        $cart = json_decode($request->input('cart'), true);
        $paymentMethod = json_decode($request->input('paymentMethod'), true);
        $products = $cart['products'];
        $packages = $cart['packages'];

        $order = Order::create([
            'user_id' => $user->id,
            'total' => $request->input('total_amount'),
            'last_four' => $paymentMethod["card"]["last4"],
            'card_type' => $paymentMethod["card"]["brand"],
        ]);

        // Products and subscriptions
        foreach ($products as $key => $product) {
            $this->processSku($order, Sku::find($product['id']), $user, $product['quantity'], $request->input('payment_method_id'));
        }

        // Packages
        foreach ($packages as $key => $package) {
            $packageItem = Package::find($package['id']);

            foreach ($packageItem->skus as $sku) {
                $this->processSku($order, $sku, $user, $packageItem->skus()->where('sku_id', $sku->id)->first()->pivot->quantity, $request->input('payment_method_id'));
            }
        }

        // Shipping
        $this->processShipping($order,  $user,  $request->input('payment_method_id'), $request->input('delivery_method') === "Standard" ? 500 : 1600);

        return $order;
    }

    public function processSku(Order $order, Sku $sku, User $user, int $quantity, string $paymentMethodId): void
    {
        if ($sku->is_subscription) {
            $paymentId = $this->subscribe($user, $sku, $quantity, $paymentMethodId);
        } else {
            $paymentId = $this->charge($user, $paymentMethodId, round(100 * ($sku->price * $quantity) + $sku->price * $quantity * $sku->vat->rate));
        }

        $order->skus()->attach($sku, [
            'payment_id' => $paymentId,
            'order_id' => $order->id,
            'quantity' => $quantity,
            'vat_amount' => $sku->price * $quantity * $sku->vat->rate,
            'status' => 'Success',
        ]);
    }

    public function processShipping($order, $user, $paymentMethodId, $amount): void
    {
        $order->skus()->attach(0, [
            'payment_id' => $this->charge($user, $paymentMethodId, $amount),
            'order_id' => $order->id,
            'quantity' => 1,
            'status' => 'Success',
        ]);
    }

    public function subscribe($user, $sku, $quantity, $paymentMethodId): string
    {
        $subscription = $user->newSubscription($sku->name, $sku->stripe_price_id)
            ->quantity($quantity)
            ->create($paymentMethodId, [], [
                'payment_behavior' => 'error_if_incomplete',
                'default_tax_rates' => $sku->stripe_tax_rate_id
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
