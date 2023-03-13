<?php

declare(strict_types=1);

namespace App\Billing;

use App\Models\ShippingMethod;
use Illuminate\Support\Collection;

final class Cart
{
    public function __construct(
        public Collection $cartItems,
        public string $paymentMethodId,
        public ?ShippingMethod $shippingMethod
    ) {}

    public function getTotal(): float
    {
        $cartTotal = $this->cartItems->sum(function (CartItem $cartItem) {
            return ($cartItem->getSku()->price * $cartItem->getQuantity()) + $cartItem->getSku()->getVatAmount($cartItem->getQuantity());
        });

        if ($this->getShippingMethod()) {
            $cartTotal += $this->getShippingMethod()->price + $this->getShippingMethod()->getVatAmount();
        }

        return $cartTotal;
    }

    public function getSubTotal(): float
    {
        return $this->cartItems->sum(function (CartItem $cartItem) {
            return $cartItem->getSku()->price * $cartItem->getQuantity();
        });
    }

    public function getVatAmount(): float
    {
        return $this->cartItems->sum(function (CartItem $cartItem) {
            return $cartItem->getSku()->getVatAmount($cartItem->getQuantity());
        });
    }

    public function getShippingSubTotal(): float
    {
        if ($this->getShippingMethod()) {
            return $this->getShippingMethod()->price;
        }

        return 0;
    }

    public function getShippingVatAmount(): float
    {
        if ($this->getShippingMethod()) {
            return $this->getShippingMethod()->getVatAmount();
        }

        return 0;
    }

    public function getCartItems(): Collection
    {
        return $this->cartItems;
    }

    public function getShippingMethod(): ShippingMethod|null
    {
        return $this->shippingMethod;
    }

    public function getSubscriptionItems(): Collection
    {
        return $this->cartItems->filter(function($item) {
            return $item->getSku()->is_subscription;
        });
    }

    public function getNonSubscriptionItems(): Collection
    {
        return $this->cartItems->filter(function($item) {
            return !$item->getSku()->is_subscription;
        });
    }

    public function getHasSubscriptionItems(): bool
    {
        $items = $this->cartItems->filter(function($item) {
            return $item->getSku()->is_subscription;
        })->first();

        if ($items) {
            return true;
        }

        return false;
    }

    public function getHasNonSubscriptionItems(): bool
    {
        $items = $this->cartItems->filter(function($item) {
            return !$item->getSku()->is_subscription;
        })->first();

        if ($items) {
            return true;
        }

        return false;
    }

    public function getPaymentMethodId(): string
    {
        return $this->paymentMethodId;
    }
}
