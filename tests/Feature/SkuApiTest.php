<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Attribute;
use App\Models\Sku;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SkuApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_skus(): void
    {
        $this->get('/api/sku')
            ->assertStatus(200);
    }

    /** @test */
    public function a_user_can_view_a_sku(): void
    {
        $sku = Sku::factory()->create();
        $attribute = Attribute::inRandomOrder()->first();

        $sku->attributes()->attach($attribute, ['value' => $value = $this->faker->name]);

        $this->get("/api/sku/{$sku->id}")
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $sku->id,
                    'name' => $sku->name,
                    'price' => $sku->price
                ]
            ])
            ->assertJsonFragment([
                'pivot' => [
                    'sku_id' => $sku->id,
                    'attribute_id' => $attribute->id,
                    'value' => $value
                ]
            ]);
    }

    /** @test */
    public function a_user_can_search_for_a_sku_by_attributes(): void
    {
        $this->withoutExceptionHandling();

        $sku = Sku::factory()->create();
        $attribute = Attribute::inRandomOrder()->first();

        $sku->attributes()->attach($attribute, ['value' => $value = $this->faker->name]);

        $this->post("/api/sku/search", [
            'attributes' => [
                [
                    'id' => $attribute->id,
                    'value' => $value
                    ]
                ]
            ])
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => $sku->id,
                'sku' => $sku->sku,
                'name' => $sku->name
            ]);
    }

    /** @test */
    public function a_signed_in_user_can_create_a_sku(): void
    {
//        $sku = Sku::factory()->raw();
//        $attribute = Attribute::inRandomOrder()->first();
//
//        $this->json('POST', '/api/sku', $sku, ['Content-Type' => 'application/json'])
//            ->assertStatus(401);
//
//        $user = User::factory()->create();
//
//        $this->actingAs($user);
//
//        $this->json('POST', '/api/sku', $sku, ['Content-Type' => 'application/json'])
//            ->assertStatus(201);
//
//        $this->assertDatabaseHas('skus', $sku);
    }

    // TODO validate required fields
}
