<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Sku;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Stripe\StripeClient;

class SkuRepository implements SkuRepositoryInterface
{
    public function getAllSkus(): Collection
    {
        return Sku::all();
    }

    /**
     * @param $skuId
     */
    public function getSkuById($skuId): Sku
    {
        return Sku::find($skuId);
    }

    /**
     * @param array $attributes
     */
    public function searchByAttribute(array $attributes): array
    {
        $query = "SELECT skus.* FROM skus";

        for ($i = 0; $i < count($attributes['attributes']); $i++) {
            $query .= " INNER JOIN attribute_sku AS attribute_sku" . $i + 1 . "
                ON skus.id = attribute_sku" . $i + 1 . ".sku_id ";
        }

        for ($i = 0; $i < count($attributes['attributes']); $i++) {
            $query .= ($i == 0 ? "WHERE" : "AND") . " attribute_sku" . $i + 1 . ".attribute_id =
                '{$attributes['attributes'][$i]['id']}'
                AND attribute_sku" . $i + 1 . ".value =
                '{$attributes['attributes'][$i]['value']}'";
        }

        return DB::select($query);
    }

    public function createSku(array $skuDetails): Sku
    {
        $sku = Sku::create([
            'sku' => $skuDetails['sku'],
            'name' => $skuDetails['name'],
            'product_id' => $skuDetails['product_id'],
            'price' => $skuDetails['price'],
            'vat_id' => $skuDetails['vat_id'],
        ]);

        // Attach attributes

        // Make name automatically

        // Create product in stripe

        // Create price in stripe
        $stripe = new StripeClient(
            env('STRIPE_SECRET'),
        );
        $stripe->prices->create([
            'unit_amount' => 4000,
            'currency' => 'gbp',
            'recurring' => ['interval' => 'month'],
            'product' => $sku->product->stripe_product_id,
        ]);

        // update sku stripe_price_id

        return $sku;
    }
}
