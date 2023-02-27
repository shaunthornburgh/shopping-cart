<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationApiTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /** @test */
    public function a_user_can_register(): void
    {
        $attributes = $this->getUserAttributes();

        $this->postJson('/api/register', $attributes)
            ->assertStatus(201)
            ->assertJson(['data' => ['name' => $attributes['name']]]);

        $this->assertDatabaseHas('users', ['name' => $attributes['name']]);
        $this->assertDatabaseHas('users', ['email' => $attributes['email']]);
    }

    /** @test */
    public function a_user_cannot_register_with_an_existing_email(): void
    {
        $attributes = $this->getUserAttributes();

        $this->postJson('/api/register', $attributes);
        $this->postJson('/api/register', $attributes)
            ->assertJsonValidationErrors([
                'email' => 'The email has already been taken.'
            ])
            ->assertStatus(422);
    }

    /** @test */
    public function name_field_is_required(): void
    {
        $attributes = $this->getUserAttributes();
        $attributes['name'] = null;

        $this->postJson('/api/register', $attributes)
            ->assertJsonValidationErrors([
                'name' => 'The name field is required.'
            ])
            ->assertStatus(422);
    }

    /** @test */
    public function email_field_is_required(): void
    {
        $attributes = $this->getUserAttributes();
        $attributes['email'] = null;

        $this->postJson('/api/register', $attributes)
            ->assertJsonValidationErrors([
                'email' => 'The email field is required.'
            ])
            ->assertStatus(422);
    }

    /** @test */
    public function email_value_must_be_a_valid_email_address(): void
    {
        $attributes = $this->getUserAttributes();
        $attributes['email'] = 'INVALID_EMAIL_ADDRESS';

        $this->postJson('/api/register', $attributes)
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'email' => 'The email must be a valid email address.'
            ]);
    }

    /** @test */
    public function password_field_is_required(): void
    {
        $attributes = $this->getUserAttributes();
        $attributes['password'] = null;

        $this->postJson('/api/register', $attributes)
            ->assertJsonValidationErrors([
                'password' => 'The password field is required.'
            ])
            ->assertStatus(422);
    }

    /** @test */
    public function password_fields_must_match(): void
    {
        $attributes = $this->getUserAttributes();
        $attributes['password_confirmation'] = 'SOMETHING_ELSE';

        $this->postJson('/api/register', $attributes)
            ->assertJsonValidationErrors([
                'password' => 'The password confirmation does not match.'
            ])
            ->assertStatus(422);
    }

    private function getUserAttributes(): array
    {
        return User::factory()->raw([
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);
    }
}
