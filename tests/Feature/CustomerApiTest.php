<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function test_a_user_can_create_a_customer(): void
    {
        $attributes = Customer::factory()->raw();

        $this->post('/api/customer', $attributes)
            ->assertStatus(201);

        $this->assertDatabaseHas('customers', $attributes);
    }

    /** @test */
    public function name_field_is_required(): void
    {
        $attributes = Customer::factory()->raw();
        $attributes['name'] = null;

        $this->postJson('/api/customer', $attributes)
            ->assertJsonValidationErrors([
                'name' => 'The name field is required.'
            ])
            ->assertStatus(422);
    }
}
