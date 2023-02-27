<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Vat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vat::create([
            'name' => 20,
            'rate' => 20,
            'stripe_tax_rate_id' => Str::random()
        ]);
    }
}
