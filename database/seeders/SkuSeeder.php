<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sku;
use App\Models\Vat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SkuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::where('category_id', '=', Category::CLOTHING)->get();

        $skuSizeNames = [];
        foreach ($products as $product) {
            foreach (Attribute::SIZES as $size) {
                $skuSizeNames[] = [
                    'product_id' => $product->id,
                    'name' => "{$product->name} {$size}",
                    'size_name' => $size
                ];
            }
        }

        $skuNames = [];
        foreach ($skuSizeNames as $skuSizeName) {
            foreach (Attribute::COLOURS as $colour) {
                $skuNames[] = [
                    'product_id' => $skuSizeName['product_id'],
                    'name' => "{$skuSizeName['name']} {$colour}",
                    'size_name' => $skuSizeName['size_name'],
                    'colour' => $colour
                ];
            }
        }

        foreach ($skuNames as $skuName) {
            $sku = Sku::factory()->create([
                'product_id' => $skuName['product_id'],
                'name' => $skuName['name'],
                'vat_id' => Vat::where('rate', 20)->first()->id
            ]);

            Attribute::where('product_id', $skuName['product_id'])
                ->colour()
                ->first()
                ->skus()
                ->attach($sku->id, ['value' => $skuName['colour']]);

            Attribute::where('product_id', $skuName['product_id'])
                ->size()
                ->first()
                ->skus()
                ->attach($sku->id, ['value' => $skuName['size_name']]);
        }

        Sku::factory()->create([
            'product_id' => Product::where('id', Product::T_SHIRTS_MONTHLY_SUBSCRIPTION)->first()->id,
            'name' => 'T-Shirts monthly plan',
            'vat_id' => Vat::RATE_20,
        ]);

        Sku::factory()->create([
            'product_id' => Product::where('id', Product::JUMPERS_MONTHLY_SUBSCRIPTION)->first()->id,
            'name' => 'Jumpers monthly plan',
            'vat_id' => Vat::RATE_20,
        ]);

        Sku::factory()->create([
            'product_id' => Product::where('id', Product::TROUSERS_MONTHLY_SUBSCRIPTION)->first()->id,
            'name' => 'Trousers monthly plan',
            'vat_id' => Vat::RATE_20,
        ]);

        Sku::factory()->create([
            'product_id' => Product::where('id', Product::ONBOARDING_FEE)->first()->id,
            'name' => 'Onboarding fee',
            'vat_id' => Vat::RATE_20,
        ]);
    }
}
