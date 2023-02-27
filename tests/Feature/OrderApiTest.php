<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Sku;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class OrderApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_payment(): void
    {
        $sku = Sku::isPackage()->first();
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com',
            'password' => Str::random(12)
        ]);

        $attributes = [
            'address' => '1 New Street',
            'apartment' => 'a 123',
            'city' => 'London',
            'country' => 'United Kingdom',
            'delivery_method' => 'Standard',
            'email' => $user->email,
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'phone' => '1234567890',
            'state' => 'state1',
            'total_amount' => '9.99',
            'zipcode' => 'NW1 1WN',
            'payment_method_id' => 'pm_card_visa',
            'cart' => '[{"id":1,"sku":"'.${$sku->id}.'","name":"T-Shirt Small Red","product_id":1,"created_at":"2023-02-22T16:31:55.000000Z","updated_at":"2023-02-22T16:31:55.000000Z","price":96.81,"is_package":false,"is_subscription":false,"package_skus":[],"quantity":1}]',
            'paymentMethod' => '{"id":"pm_card_visa","object":"payment_method","billing_details":{"address":{"city":"London","country":null,"line1":"1 New Street","line2":null,"postal_code":"12345","state":""},"email":"test@test.com","name":"John Doe","phone":null},"card":{"brand":"visa","checks":{"address_line1_check":null,"address_postal_code_check":null,"cvc_check":null},"country":"US","exp_month":4,"exp_year":2024,"funding":"credit","generated_from":null,"last4":"4242","networks":{"available":["visa"],"preferred":null},"three_d_secure_usage":{"supported":true},"wallet":null},"created":1677153335,"customer":null,"livemode":false,"type":"card"}',
        ];

        $this->postJson('/api/payment', $attributes)
            ->assertStatus(200);
    }
}
