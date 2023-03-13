<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Attribute;
use App\Models\Package;
use App\Models\Sku;
use App\Models\Vat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class SkuTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test  */
    public function it_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('skus', [
                'id', 'sku', 'product_id', 'name', 'stripe_price_id', 'vat_id'
            ])
        );
    }

    /** @test  */
    public function it_has_a_product(): void
    {
        $sku = Sku::factory()->create();
        $this->assertEquals($sku->product_id, $sku->product->id);
    }

    /** @test  */
    public function it_has_a_vat(): void
    {
        $sku = Sku::factory()->create(
            ['vat_id' => Vat::RATE_20]
        );
        $this->assertEquals($sku->vat_id, $sku->vat->id);
    }

    /** @test  */
    public function it_can_add_an_attribute()
    {
        $sku = Sku::factory()->create();
        $attribute = Attribute::factory()->create();

        $sku->attributes()->attach($attribute, ['value' => $value = $this->faker->name]);

        $this->assertDatabaseHas('attribute_sku', [
            'attribute_id' => $attribute->id,
            'sku_id' => $sku->id,
            'value' => $value
        ]);
    }

    /** @test  */
    public function it_can_add_an_package()
    {
        $sku = Sku::factory()->create();
        $package = Package::factory()->create();

        $sku->packages()->attach($package, ['quantity' => $quantity = $this->faker->numberBetween(1, 10)]);

        $this->assertDatabaseHas('package_sku', [
            'package_id' => $package->id,
            'sku_id' => $sku->id,
            'quantity' => $quantity
        ]);
    }

    /** @test  */
    public function it_has_correct_vat_amount()
    {
        $sku = Sku::factory()->create();

        $this->assertTrue($sku->getVatAmount(1) == round((($sku->price * $sku->vat->rate) / 100), 2));

        $skuNoVat = Sku::factory()->create([
            'vat_id' => null
        ]);

        $this->assertTrue($skuNoVat->getVatAmount(1) == 0);
    }
}
