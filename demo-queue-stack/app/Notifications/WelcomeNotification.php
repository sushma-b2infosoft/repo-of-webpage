<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Welcome!')
            ->line('Thanks for registering with us.');
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Welcome, ' . $notifiable->name,
        ];
    }
}

