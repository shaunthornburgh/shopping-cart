<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Billing\Cart;
use App\Billing\CartItem;
use App\Billing\PaymentGatewayInterface;
use App\Models\Order;
use App\Models\Package;
use App\Models\ShippingMethod;
use App\Models\Sku;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @param PaymentGatewayInterface $paymentGateway
     */
    public function __construct(
        public PaymentGatewayInterface $paymentGateway
    ) {}

    /**
     * @param $orderId
     */
    public function getOrderById($orderId): Sku
    {
        return Sku::find($orderId);
    }

    /**
     * @param array $orderDetails
     */
    public function createOrder(array $orderDetails): Order
    {
        $user = $this->paymentGateway->getUser($orderDetails);
        $cartRequest = json_decode($orderDetails['cart'], true);
        $paymentMethod = json_decode($orderDetails['paymentMethod'], true);
        $cartItems = collect();

        foreach ($cartRequest['products'] as $cartItem) {
            $cartItems->push(new CartItem(
                Sku::where('sku', $cartItem['sku'])->first(),
                $cartItem['quantity']
            ));
        }

        foreach ($cartRequest['packages'] as $package) {
            $packageItem = Package::find($package['id']);

            foreach ($packageItem->skus as $sku) {
                $cartItems->push(new CartItem(
                    $sku,
                    $packageItem->skus()->where('sku_id', $sku->id)->first()->pivot->quantity,
                ));
            }
        }

        $cart = new Cart(
            $cartItems,
            $orderDetails['payment_method_id'],
            $orderDetails['shipping_method'] ? ShippingMethod::where('name', $orderDetails['shipping_method'])->first() : null
        );

        if ($cart->getHasSubscriptionItems()) {
            $paymentId = $this->paymentGateway->subscribe($user, $cart);
        } else {
            $paymentId = $this->paymentGateway->charge($user, $cart);
        }

        $order = Order::create([
            'user_id' => $user->id,
            'sub_total' => $cart->getSubTotal(),
            'vat_amount' => $cart->getVatAmount(),
            'shipping_sub_total' => $cart->getShippingSubTotal(),
            'shipping_vat_amount' => $cart->getShippingVatAmount(),
            'last_four' => $paymentMethod["card"]["last4"],
            'card_type' => $paymentMethod["card"]["brand"],
            'shipping_method_id' => $cart->getShippingMethod()?->id,
        ]);

        $cart->getCartItems()->each(function(CartItem $cartItem) use ($order, $paymentId) {
            $order->addSku(
                $paymentId,
                $order,
                $cartItem->getSku(),
                $quantity = $cartItem->getQuantity(),
                $cartItem->getSku()->getVatAmount($quantity),
                'Success'
            );
        });

        return $order;
    }
}

