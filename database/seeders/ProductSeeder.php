<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'category_id' => Category::CLOTHING,
                'name' => 'T-Shirt',
                'slug' => 't-shirt',
                'description' => $this->paragraph()
            ],
            [
                'category_id' => Category::CLOTHING,
                'name' => 'Jumper',
                'slug' => 'jumper',
                'description' => $this->paragraph()
            ],
            [
                'category_id' => Category::CLOTHING,
                'name' => 'Trousers',
                'slug' => 'trousers',
                'description' => $this->paragraph()
            ],
            [
                'category_id' => Category::SUBSCRIPTIONS,
                'name' => 'T-shirts monthly subscription',
                'slug' => 't-shirts-monthly-subscription',
                'description' => $this->paragraph()
            ],
            [
                'category_id' => Category::SUBSCRIPTIONS,
                'name' => 'Jumpers monthly subscription',
                'slug' => 'jumpers-monthly-subscription',
                'description' => $this->paragraph()
            ],
            [
                'category_id' => Category::SUBSCRIPTIONS,
                'name' => 'Trousers monthly subscription',
                'slug' => 'trousers monthly subscription',
                'description' => $this->paragraph()
            ],
            [
                'category_id' => Category::OTHER,
                'name' => 'Onboarding fee',
                'slug' => 'onboarding-fee',
                'description' => $this->paragraph()
            ],
        ]);
    }

    private function paragraph()
    {
        return 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque finibus mollis vehicula. Suspendisse sollicitudin vitae orci eget cursus. Nullam ut blandit lectus. Vivamus rutrum, dui sed pulvinar interdum, tellus nunc blandit nulla, eu tempor ante massa vel eros. Phasellus finibus rhoncus mi. In sollicitudin finibus ante ut vehicula. Cras faucibus lobortis erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam lectus odio, posuere sit amet lorem mollis, placerat vestibulum libero. Morbi aliquet eu est in posuere. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur blandit augue ut metus interdum pulvinar. In facilisis posuere tortor et laoreet. Nulla efficitur blandit diam, porttitor posuere ante eleifend eget. Proin et molestie ipsum, sit amet mollis magna. Praesent elementum sit amet eros quis malesuada.';
    }
}
