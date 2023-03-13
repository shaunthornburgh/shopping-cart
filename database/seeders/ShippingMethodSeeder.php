<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ShippingMethod;
use App\Models\Vat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShippingMethod::create([
            'name' => 'Standard',
            'description' => '4 - 10 business days',
            'price' => '4.99',
            'vat_id' => Vat::RATE_20,
            'stripe_price_id' => 'price_0MkuxE9GwWIyQ6JWR5NRxGRZ',
            'default' => true
        ]);

        ShippingMethod::create([
            'name' => 'Express',
            'description' => '1 - 2 business days',
            'price' => '7.99',
            'vat_id' => Vat::RATE_20,
            'stripe_price_id' => 'price_0MkuxF9GwWIyQ6JWexJfdMt6',
        ]);
    }
}
