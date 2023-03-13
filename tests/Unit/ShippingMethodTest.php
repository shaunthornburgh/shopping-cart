<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Attribute;
use App\Models\Package;
use App\Models\ShippingMethod;
use App\Models\Sku;
use App\Models\Vat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ShippingMethodTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test  */
    public function it_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('shipping_methods', [
                'id', 'name', 'description', 'price', 'vat_id', 'default', 'stripe_price_id'
            ])
        );
    }

    /** @test  */
    public function it_has_a_vat(): void
    {
        $shippingMethod = ShippingMethod::factory()->create(
            ['vat_id' => Vat::RATE_20]
        );
        $this->assertEquals($shippingMethod->vat_id, $shippingMethod->vat->id);
    }

    /** @test  */
    public function it_has_correct_vat_amount()
    {
        $shippingMethod = ShippingMethod::factory()->create([
            'vat_id' => Vat::RATE_20
        ]);

        $this->assertTrue($shippingMethod->getVatAmount(1) == round((($shippingMethod->price * $shippingMethod->vat->rate) / 100), 2));

        $shippingMethodNoVat = ShippingMethod::factory()->create([
            'vat_id' => null
        ]);

        $this->assertTrue($shippingMethodNoVat->getVatAmount(1) == 0);
    }

}
