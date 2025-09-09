<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;

class SendWelcomeEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user; // 👈 yeh property add karo

    /**
     * Create a new event instance.
     */
    public function __construct($user)
    {
        $this->user = $user; // 👈 constructor me assign karo
    }
}



