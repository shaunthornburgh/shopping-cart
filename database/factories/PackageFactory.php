<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Sku;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Customer>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $name = fake()->name(),
            'slug' => Str::slug($name, '-'),
            'price' => $this->faker->randomFloat(2, 20, 100),
        ];
    }
}
