<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\Attribute;
use App\Models\Order;
use App\Models\Package;
use App\Models\Sku;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test  */
    public function it_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('orders', [
                'id', 'user_id', 'total', 'last_four', 'card_type'
            ])
        );
    }

    /** @test  */
    public function it_has_a_user(): void
    {
        $order = Order::factory()->create();
        $this->assertEquals($order->user_id, $order->user->id);
    }

    /** @test  */
    public function it_can_add_a_sku()
    {
        $order = Order::factory()->create();
        $sku = Sku::factory()->create();

        $order->skus()->attach($sku, [
            'quantity' => $quantity = $this->faker->numberBetween(1, 10),
            'payment_id' => $paymentId = $this->faker->numberBetween(1, 10),
            'status' => $status = $this->faker->word
        ]);

        $this->assertDatabaseHas('order_sku', [
            'order_id' => $order->id,
            'sku_id' => $sku->id,
            'quantity' => $quantity,
            'payment_id' => $paymentId,
            'status' => $status,
        ]);
    }
}
