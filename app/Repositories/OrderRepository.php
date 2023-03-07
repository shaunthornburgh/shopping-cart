<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Billing\PaymentGatewayInterface;
use App\Models\Order;
use App\Models\Package;
use App\Models\Sku;
use App\Models\User;
use App\Services\PaymentService;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository implements OrderRepositoryInterface
{
    private PaymentGatewayInterface $paymentGateway;

    public function __construct(PaymentGatewayInterface $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function getAllSkus(): Collection
    {
        return Sku::all();
    }

    /**
     * @param $skuId
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

        $cart = json_decode($orderDetails['cart'], true);
        $paymentMethod = json_decode($orderDetails['paymentMethod'], true);
        $products = $cart['products'];
        $packages = $cart['packages'];

        $order = Order::create([
            'user_id' => $user->id,
            'total' => $orderDetails['total_amount'],
            'last_four' => $paymentMethod["card"]["last4"],
            'card_type' => $paymentMethod["card"]["brand"],
        ]);

        // Products and subscriptions
        foreach ($products as $product) {
            $this->processSku(
                $order,
                Sku::find($product['id']),
                $user,
                $product['quantity'],
                $orderDetails['payment_method_id']
            );
        }

        // Packages
        foreach ($packages as $package) {
            $packageItem = Package::find($package['id']);

            foreach ($packageItem->skus as $sku) {
                $this->processSku(
                    $order,
                    $sku,
                    $user,
                    $packageItem->skus()->where('sku_id', $sku->id)->first()->pivot->quantity,
                    $orderDetails['payment_method_id']
                );
            }
        }

        // Shipping
        $this->processShipping(
            $order,
            $user,
            $orderDetails['payment_method_id'],
            $orderDetails['delivery_method'] === "Standard" ? 500 : 1600
        );

        return $order;
    }

    public function processSku(Order $order, Sku $sku, User $user, int $quantity, string $paymentMethodId): void
    {
        if ($sku->is_subscription) {
            $paymentId = $this->paymentGateway->subscribe($user, $sku, $quantity, $paymentMethodId);
        } else {
            $paymentId = $this->paymentGateway->charge(
                $user,
                $paymentMethodId,
                ($sku->price + $sku->getVatAmount($quantity)) * 100
            );
        }

        $order->addSku(
            $paymentId,
            $order,
            $sku,
            $quantity,
            $sku->getVatAmount($quantity),
            'Success'
        );
    }

    public function processShipping($order, $user, $paymentMethodId, $amount): void
    {
        $order->skus()->attach(0, [
            'payment_id' => $this->paymentGateway->charge($user, $paymentMethodId, $amount),
            'order_id' => $order->id,
            'quantity' => 1,
            'status' => 'Success',
        ]);
    }

}

