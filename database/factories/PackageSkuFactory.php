<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Package;
use App\Models\Sku;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class PackageSkuFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $parent = Package::factory()->create();
        $child = Sku::factory()->create();

        return [
            'package_id' => $parent->id,
            'sku_id' => $child->id,
            'quantity' => fake()->numberBetween(1, 10)
        ];
    }
}
