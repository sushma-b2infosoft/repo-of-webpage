<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;


use Tests\TestCase;
use App\Jobs\SendWelcomeEmail;
use Illuminate\Support\Facades\Queue;
use App\Models\User;

class JobTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_dispatches_welcome_email_job()
    {
        Queue::fake();

        $user = User::factory()->create();
        SendWelcomeEmail::dispatch($user);

        Queue::assertPushed(SendWelcomeEmail::class, function ($job) use ($user) {
            return $job->user->id === $user->id;
        });
    }
}

