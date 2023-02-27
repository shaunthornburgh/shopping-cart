<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_products(): void
    {
        $this->get('/api/product')
            ->assertStatus(200);
    }

    /** @test */
    public function a_user_can_view_a_product(): void
    {
        $product = Product::factory()->create();

        $this->get("/api/product/{$product->id}")
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $product->id,
                    'name' => $product->name,
                ]
            ]);
    }
}
