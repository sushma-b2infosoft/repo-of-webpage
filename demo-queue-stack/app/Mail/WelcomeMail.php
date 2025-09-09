<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public \App\Models\User $user){}
    public function build()
{
    return $this->markdown('emails.welcome')
                ->subject('Welcome to '.config('app.name'))
                ->with(['user' => $this->user]);
}

    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome Mail',
        );
    }

    
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.welcome',
        );
    }
    public function attachments(): array
    {
        return [];
    }
}
