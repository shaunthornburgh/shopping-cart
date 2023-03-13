<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\ShippingMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShippingMethodApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_shipping_methods(): void
    {
        $this->get('/api/shipping-method')
            ->assertStatus(200);
    }

    /** @test */
    public function a_user_can_view_a_shipping_method(): void
    {
        $shippingMethod = ShippingMethod::factory()->create();

        $this->get("/api/shipping-method/{$shippingMethod->id}")
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $shippingMethod->id,
                    'name' => $shippingMethod->name,
                    'price' => $shippingMethod->price
                ]
            ]);
    }
}
