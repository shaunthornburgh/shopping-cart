<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Package;
use App\Models\Sku;
use App\Models\Vat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PackageTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test  */
    public function it_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('packages', [
                'id', 'name', 'price', 'vat_id'
            ])
        );
    }

    /** @test  */
    public function it_has_a_vat(): void
    {
        $package = Package::factory()->create(
            ['vat_id' => Vat::RATE_20]
        );
        $this->assertEquals($package->vat_id, $package->vat->id);
    }

    /** @test  */
    public function it_can_add_a_sku()
    {
        $sku = Sku::factory()->create();
        $package = Package::factory()->create();

        $package->skus()->attach($sku, ['quantity' => $quantity = $this->faker->numberBetween(1, 10)]);

        $this->assertDatabaseHas('package_sku', [
            'package_id' => $package->id,
            'sku_id' => $sku->id,
            'quantity' => $quantity
        ]);
    }
}
