<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Package;
use App\Models\PackageSku;
use App\Models\Product;
use App\Models\Sku;
use App\Models\Vat;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $package = Package::factory()->create([
            'name' => 'Clothing Package',
            'slug' => 'clothing-package',
            'vat_id' => Vat::RATE_20,
        ]);

        $skus = Sku::whereHas('product', function($query) {
            $query->where('category_id', Category::SUBSCRIPTIONS);
        })->get();

        foreach ($skus as $sku) {
            PackageSku::create([
                'package_id' => $package->id,
                'sku_id' => $sku->id,
                'quantity' => 2,
            ]);
        }
    }
}
