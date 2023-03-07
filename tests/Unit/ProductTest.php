<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Product;
use App\Models\Sku;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test  */
    public function it_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('products', [
                'id', 'name', 'stripe_product_id'
            ])
        );
    }

    /** @test  */
    public function it_has_a_category(): void
    {
        $product = Product::factory()->create();
        $this->assertEquals($product->category_id, $product->category->id);
    }

    /** @test */
    public function it_can_add_a_sku()
    {
        $product = Product::factory()->create();

        $sku = Sku::factory()->create([
            'product_id' => $product->id
        ]);

        $this->assertCount(1, $product->skus);
        $this->assertTrue($product->skus->contains($sku));
    }
}
