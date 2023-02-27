<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Attribute;
use App\Models\Sku;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class AttributeTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test  */
    public function it_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('attributes', [
                'id', 'product_id', 'name'
            ])
        );
    }

    /** @test  */
    public function it_has_a_product(): void
    {
        $attribute = Attribute::factory()->create();
        $this->assertEquals($attribute->product_id, $attribute->product->id);
    }

    /** @test  */
    public function it_can_add_a_sku()
    {
        $sku = Sku::factory()->create();
        $attribute = Attribute::factory()->create();

        $attribute->skus()->attach($sku, ['value' => $value = $this->faker->name]);

        $this->assertDatabaseHas('attribute_sku', [
            'attribute_id' => $attribute->id,
            'sku_id' => $sku->id,
            'value' => $value
        ]);
    }
}
