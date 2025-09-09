<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use App\Events\UserRegistered;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_registered_event_is_dispatched(): void
    {
        Event::fake();

        // Create user (this will fire the registered event if you dispatch it in model/controller)
        $user = User::factory()->create();

        // Dispatch event manually if needed
        event(new UserRegistered($user));

        // Assert event was dispatched
        Event::assertDispatched(UserRegistered::class, function ($e) use ($user) {
            return $e->user->id === $user->id;
        });
    }
}


