<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Billing\PaymentGatewayInterface;
use App\Models\Category;
use App\Models\Product;
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
    public function a_customer_can_purchase_a_subscription()
    {
        $this->withoutExceptionHandling();

        $product = Product::factory()->create([
            'category_id' => Category::OTHER,
            'name' => 'Test product',
        ]);
        $sku = Sku::factory()->create([
            'product_id' => $product->id,
            'price' => $price = fake()->randomFloat(2, 20, 100),
            'stripe_price_id' => 'price_0MeGNY9GwWIyQ6JWCiruqTsF'
        ]);

        $vatRate = Vat::where('id', Vat::RATE_20)->first();

        $vatRate->update([
            'stripe_tax_rate_id' => 'txr_0Mf8xd9GwWIyQ6JWoJGj6Brl'
        ]);

        $user = User::factory()->create();

        $this->post('/api/order', [
            'address' => '1 New Street',
            'apartment' => 'a 123',
            'city' => 'London',
            'country' => 'United Kingdom',
            'delivery_method' => 'Standard',
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'phone' => '1234567890',
            'state' => 'state1',
            'total_amount' => $price,
            'zip_code' => 'NW1 1WN',
            'payment_method_id' => 'pm_card_visa',
            'cart' => '{"products":[{"id":'.$sku->id.',"sku":"'.$sku->sku.'","name":"'.$sku->name.'","product_id":'.$sku->product->id.',"created_at":"2023-02-26T12:06:49.000000Z","updated_at":"2023-02-26T12:06:49.000000Z","price":26.08,"vat_id":1,"is_package":false,"is_subscription":true,"packages":[],"vat":{"id":1,"name":"20","rate":20,"stripe_tax_rate_id":"' . $vatRate->stripe_tax_rate_id . '","created_at":"2023-02-26T12:06:49.000000Z","updated_at":"2023-02-26T12:06:49.000000Z"},"quantity":1}],"packages":[]}',
            'paymentMethod' => '{"id":"pm_0Mi2yo9GwWIyQ6JWyXsLbpMA","object":"payment_method","billing_details":{"address":{"city":"London","country":null,"line1":"1 New Street","line2":null,"postal_code":"12334","state":"London"},"email":"test@test.com","name":"John Doe","phone":null},"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":null},"country":"US","exp_month":4,"exp_year":2024,"funding":"credit","generated_from":null,"last4":"4242","networks":{"available":["visa"],"preferred":null},"three_d_secure_usage":{"supported":true},"wallet":null},"created":1677966662,"customer":null,"livemode":false,"type":"card"}'
        ])
            ->assertStatus(201);

        $this->assertNotNull($user->orders()->first());
        $this->assertTrue($user->orders->first()->skus->contains($sku));
        $this->assertTrue(count($user->orders->first()->skus) == 1);
    }
}
