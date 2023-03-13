<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingMethod;
use App\Models\Sku;
use App\Models\User;
use App\Models\Vat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_an_order(): void
    {
        $order = Order::factory()->create();

        $this->get("/api/order/{$order->id}")
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $order->id
                ]
            ]);
    }

    /** @test */
    public function a_user_can_purchase_a_subscription(): void
    {
        $product = Product::factory()->create([
            'category_id' => Category::SUBSCRIPTIONS,
            'name' => 'Test subscription',
        ]);
        $sku = Sku::factory()->create([
            'product_id' => $product->id,
            'price' => 20,
            'stripe_price_id' => 'price_0MeGNY9GwWIyQ6JWCiruqTsF'
        ]);

        $vatRate = Vat::where('id', Vat::RATE_20)->first();

        $vatRate->update([
            'stripe_tax_rate_id' => 'txr_0Mf8xd9GwWIyQ6JWoJGj6Brl'
        ]);

        $user = User::factory()->create();

        $this->post('/api/order', $this->getOrderRequestJson($user, [$sku]))
            ->assertStatus(201);

        $this->assertNotNull($user->orders()->first());
        $this->assertTrue($user->orders->first()->skus->contains($sku));
        $this->assertTrue(count($user->orders->first()->skus) == 1);
        $this->assertTrue($user->orders()->first()->sub_total == $sku->price);
        $this->assertTrue($user->orders()->first()->vat_amount == $sku->getVatAmount(1));
    }

    /** @test */
    public function a_user_can_purchase_multiple_subscriptions(): void
    {
        $product = Product::factory()->create([
            'category_id' => Category::SUBSCRIPTIONS,
            'name' => 'Test subscription 1',
        ]);


        $subscriptionSku1 = Sku::factory()->create([
            'name' => 'Subscription - Plan A',
            'product_id' => $product->id,
            'price' => 10,
            'stripe_price_id' => 'price_0MeGNY9GwWIyQ6JWCiruqTsF'
        ]);

        $subscriptionSku2 = Sku::factory()->create([
            'name' => 'Subscription - Plan B',
            'product_id' => $product->id,
            'price' => 20,
            'stripe_price_id' => 'price_0MeGNq9GwWIyQ6JWZaDQ3w0q'
        ]);

        $vatRate = Vat::where('id', Vat::RATE_20)->first();
        $vatRate->update([
            'stripe_tax_rate_id' => 'txr_0Mf8xd9GwWIyQ6JWoJGj6Brl'
        ]);

        $user = User::factory()->create();

        $this->post('/api/order', $this->getOrderRequestJson($user, [$subscriptionSku1, $subscriptionSku2]))
            ->assertStatus(201);

        $this->assertNotNull($user->orders()->first());
        $this->assertTrue($user->orders->first()->skus->contains($subscriptionSku1));
        $this->assertTrue($user->orders->first()->skus->contains($subscriptionSku2));
        $this->assertTrue(count($user->orders->first()->skus) == 2);
        $this->assertTrue($user->orders()->first()->sub_total == $subscriptionSku1->price + $subscriptionSku2->price);
        $this->assertTrue($user->orders()->first()->vat_amount == $subscriptionSku1->getVatAmount(1) + $subscriptionSku2->getVatAmount(1));
    }

    /** @test */
    public function a_user_can_purchase_a_subscription_and_a_product(): void
    {
        $product = Product::factory()->create([
            'category_id' => Category::CLOTHING,
            'name' => 'Test product',
        ]);
        $productSku = Sku::factory()->create([
            'name' => 'Product sku',
            'product_id' => $product->id,
            'price' => 20,
            'stripe_price_id' => 'price_0Mjn9U9GwWIyQ6JWzrg2ES2T'
        ]);

        $subscription = Product::factory()->create([
            'category_id' => Category::SUBSCRIPTIONS,
            'name' => 'Test subscription',
        ]);
        $subscriptionSku = Sku::factory()->create([
            'name' => 'Subscription sku',
            'product_id' => $subscription->id,
            'price' => 10,
            'stripe_price_id' => 'price_0MeGNY9GwWIyQ6JWCiruqTsF'
        ]);

        $vatRate = Vat::where('id', Vat::RATE_20)->first();
        $vatRate->update([
            'stripe_tax_rate_id' => 'txr_0Mf8xd9GwWIyQ6JWoJGj6Brl'
        ]);

        $user = User::factory()->create();

        $shippingMethod = ShippingMethod::find(ShippingMethod::STANDARD);

        $this->post('/api/order', $this->getOrderRequestJson($user, [$productSku, $subscriptionSku], [], $shippingMethod))
            ->assertStatus(201);

        $this->assertNotNull($user->orders()->first());
        $this->assertTrue($user->orders->first()->skus->contains($productSku));
        $this->assertTrue($user->orders->first()->skus->contains($subscriptionSku));
        $this->assertTrue(count($user->orders->first()->skus) == 2);
        $this->assertTrue($user->orders()->first()->sub_total == $productSku->price + $subscriptionSku->price);
        $this->assertTrue($user->orders()->first()->vat_amount == $productSku->getVatAmount(1) + $subscriptionSku->getVatAmount(1));
        $this->assertTrue($user->orders()->first()->shipping_sub_total == $shippingMethod->price);
        $this->assertTrue($user->orders()->first()->shipping_vat_amount == $shippingMethod->getVatAmount());
    }

    /** @test */
    public function a_user_can_purchase_a_package(): void
    {

    }

    /** @test */
    public function a_user_can_purchase_a_product(): void
    {
        $product = Product::factory()->create([
            'category_id' => Category::CLOTHING,
            'name' => 'Test product',
        ]);

        $sku = Sku::factory()->create([
            'product_id' => $product->id,
            'price' => 20,
            'stripe_price_id' => 'price_0Mjn9U9GwWIyQ6JWzrg2ES2T'
        ]);

        $vatRate = Vat::where('id', Vat::RATE_20)->first();

        $vatRate->update([
            'stripe_tax_rate_id' => 'txr_0Mf8xd9GwWIyQ6JWoJGj6Brl'
        ]);

        $shippingMethod = ShippingMethod::find(ShippingMethod::STANDARD);

        $user = User::factory()->create();

        $this->post('/api/order', $this->getOrderRequestJson($user, [$sku], [], $shippingMethod))
            ->assertStatus(201);

        $this->assertNotNull($user->orders()->first());
        $this->assertTrue($user->orders->first()->skus->contains($sku));
        $this->assertTrue(count($user->orders->first()->skus) == 1);
        $this->assertTrue($user->orders()->first()->sub_total == $sku->price);
        $this->assertTrue($user->orders()->first()->vat_amount == $sku->getVatAmount(1));
        $this->assertTrue($user->orders()->first()->shipping_sub_total == $shippingMethod->price);
        $this->assertTrue($user->orders()->first()->shipping_vat_amount == $shippingMethod->getVatAmount());

    }

    /** @test */
    public function a_user_can_purchase_multiple_products(): void
    {
        $product1 = Product::factory()->create([
            'category_id' => Category::CLOTHING,
            'name' => 'Test product 1',
        ]);
        $sku1 = Sku::factory()->create([
            'product_id' => $product1->id,
            'price' => 20,
            'stripe_price_id' => 'price_0Mjn9U9GwWIyQ6JWzrg2ES2T'
        ]);

        $product2 = Product::factory()->create([
            'category_id' => Category::CLOTHING,
            'name' => 'Test product 2',
        ]);
        $sku2 = Sku::factory()->create([
            'product_id' => $product2->id,
            'price' => 20,
            'stripe_price_id' => 'price_0Mjn9U9GwWIyQ6JWzrg2ES2T'
        ]);

        $vatRate = Vat::where('id', Vat::RATE_20)->first();

        $vatRate->update([
            'stripe_tax_rate_id' => 'txr_0Mf8xd9GwWIyQ6JWoJGj6Brl'
        ]);

        $user = User::factory()->create();

        $shippingMethod = ShippingMethod::find(ShippingMethod::STANDARD);

        $this->post('/api/order', $this->getOrderRequestJson($user, [$sku1, $sku2], [], $shippingMethod))
            ->assertStatus(201);

        $this->assertNotNull($user->orders()->first());
        $this->assertTrue($user->orders->first()->skus->contains($sku1));
        $this->assertTrue($user->orders->first()->skus->contains($sku2));
        $this->assertTrue(count($user->orders->first()->skus) == 2);
        $this->assertTrue($user->orders()->first()->sub_total == $sku1->price + $sku2->price);
        $this->assertTrue($user->orders()->first()->vat_amount == $sku1->getVatAmount(1) + $sku2->getVatAmount(1));
        $this->assertTrue($user->orders()->first()->shipping_sub_total == $shippingMethod->price);
        $this->assertTrue($user->orders()->first()->shipping_vat_amount == $shippingMethod->getVatAmount());
    }

    /**
     * @param User $user
     * @param Vat $vat
     * @param array $skus
     * @param array $packages
     * @param null $shippingMethod
     */
    private function getOrderRequestJson(User $user, array $skus = [], array $packages = [], $shippingMethod = null): array
    {
        $totalAmount = 0;
        $skuItems = [];

        foreach ($skus as $sku) {
            $skuItems[] = [
                "sku" => $sku->sku,
                "quantity" => 1
           ];

            $totalAmount += $sku->price;
        }

        return [
            'address' => '1 New Street',
            'apartment' => 'a 123',
            'city' => 'London',
            'country' => 'United Kingdom',
            'shipping_method' => $shippingMethod !== null ? $shippingMethod->name : '',
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'phone' => '1234567890',
            'county' => 'London',
            'total_amount' => $totalAmount,
            'postcode' => 'NW1 1WN',
            'payment_method_id' => 'pm_card_visa',
            'cart' => json_encode([
                "products" => $skuItems,
                "packages" => [],
            ]),
            'paymentMethod' => '{"id":"pm_card_visa","object":"payment_method","billing_details":{"address":{"city":"London","country":null,"line1":"1 New Street","line2":null,"postal_code":"12334","state":"London"},"email":"test@test.com","name":"John Doe","phone":null},"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":null},"country":"US","exp_month":4,"exp_year":2024,"funding":"credit","generated_from":null,"last4":"4242","networks":{"available":["visa"],"preferred":null},"three_d_secure_usage":{"supported":true},"wallet":null},"created":1677966662,"customer":null,"livemode":false,"type":"card"}'
        ];
    }

    // TODO Test tax

    // TODO test shipping rate
}
