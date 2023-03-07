<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Vat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Customer>
 */
class SkuFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => 'Sku name',
            'product_id' => Product::inRandomOrder()->first()->id,
            'sku' => Str::random(32),
            'price' => $this->faker->randomFloat(2, 20, 100),
            'vat_id' => Vat::RATE_20
        ];
    }
}
