<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
           Attribute::insert([
                [
                    'product_id' => $product->id,
                    'name' => Attribute::SIZE
                ],
                [
                    'product_id' => $product->id,
                    'name' => Attribute::COLOUR
                ]
            ]);
        }
    }
}
