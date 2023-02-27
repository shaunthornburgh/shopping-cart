<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Package;
use App\Models\Sku;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PackageApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_packages(): void
    {
        $this->get('/api/package')
            ->assertStatus(200);
    }

    /** @test */
    public function a_user_can_view_a_package(): void
    {
        $package = Package::factory()->create();
        $sku = Sku::factory()->create();

        $package->skus()->attach($sku, ['quantity' => $quantity = $this->faker->numberBetween(1, 10)]);

        $this->get("/api/package/{$package->id}")
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $package->id,
                    'name' => $package->name,
                    'price' => $package->price
                ]
            ])
            ->assertJsonFragment([
                'pivot' => [
                    'package_id' => $package->id,
                    'sku_id' => $sku->id,
                    'quantity' => $quantity
                ]
            ]);
    }
}
