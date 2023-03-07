<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Customer::factory(10)->create();

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            AttributeSeeder::class,
            VatSeeder::class,
            SkuSeeder::class,
            PackageSeeder::class,
            VatSeeder::class,
        ]);
    }
}
