<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\WelcomeNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_welcome_notification_is_sent(): void
    {
        Notification::fake();

        $user = User::factory()->create();

        // Send notification
        $user->notify(new WelcomeNotification());

        // Assert notification was sent
        Notification::assertSentTo(
            [$user],
            WelcomeNotification::class
        );
    }
}


