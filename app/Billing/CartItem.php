<?php

declare(strict_types=1);

namespace App\Billing;

use App\Models\Sku;

final class CartItem
{
    public function __construct(
        public Sku $sku,
        public int $quantity
    ) {}

    public function getSku(): Sku
    {
        return $this->sku;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
