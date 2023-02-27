<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Opportunity;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OpportunityApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function test_a_user_can_create_a_opportunity(): void
    {
        $attributes = Opportunity::factory()->raw();

        $this->post('/api/opportunity', $attributes)
            ->assertStatus(201);

        $this->assertDatabaseHas('opportunities', $attributes);
    }

    /** @test */
    public function name_field_is_required(): void
    {
        $attributes = Opportunity::factory()->raw();
        $attributes['name'] = null;

        $this->postJson('/api/opportunity', $attributes)
            ->assertJsonValidationErrors([
                'name' => 'The name field is required.'
            ])
            ->assertStatus(422);
    }

    public function email_field_is_required(): void
    {
        $attributes = Opportunity::factory()->raw();
        $attributes['email'] = null;

        $this->postJson('/api/opportunity', $attributes)
            ->assertJsonValidationErrors([
                'name' => 'The email field is required.'
            ])
            ->assertStatus(422);
    }

    /** @test */
    public function email_value_must_be_a_valid_email_address(): void
    {
        $attributes = Opportunity::factory()->raw();
        $attributes['email'] = 'INVALID_EMAIL_ADDRESS';

        $this->postJson('/api/opportunity', $attributes)
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'email' => 'The email must be a valid email address.'
            ]);
    }

    public function phone_number_field_is_required(): void
    {
        $attributes = Opportunity::factory()->raw();
        $attributes['phone_number'] = null;

        $this->postJson('/api/opportunity', $attributes)
            ->assertJsonValidationErrors([
                'name' => 'The phone_number field is required.'
            ])
            ->assertStatus(422);
    }
}
