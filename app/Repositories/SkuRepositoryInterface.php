<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Sku;
use Stripe\StripeClient;

interface SkuRepositoryInterface
{
    public function getAllSkus();
    public function getSkuById($skuId);
    public function searchByAttribute(array $attributes);
    public function createSku(array $skuDetails);
}
