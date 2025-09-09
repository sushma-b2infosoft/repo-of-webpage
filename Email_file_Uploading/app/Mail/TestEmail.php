<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user; // pass user data
    }

    public function build()
    {
        return $this->subject('Welcome to Laravel Email')
                    ->view('emails.test'); // Blade template
    }
}


