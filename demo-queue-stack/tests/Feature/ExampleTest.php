<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        // Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Hit the homepage
        $response = $this->get('/');

        // Assert 200 OK
        $response->assertStatus(200);

        // Optional: check content
        $response->assertSee($user->name);
    }
}

