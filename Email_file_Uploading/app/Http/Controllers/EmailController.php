<?php

// namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Mail;
// use App\Mail\TestEmail;
// use App\Models\User;
// use App\Mail\WelcomeEmail;

// class EmailController extends Controller
// {
//     public function sendEmail()
//     {
//         $user = User::first(); // example: first user

//         // 1️⃣ Direct send
//         // Mail::to($user->email)->send(new TestEmail($user));

//         // 2️⃣ Queue send (background)
//         // Mail::to($user->email)->queue(new TestEmail($user));
//        Mail::to($user->email)->send(new WelcomeEmail($user));

//         return "Email sent successfully!";
//     }
// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeEmail; // import Mailable
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $user = User::first();
        if (!$user) return "No user found";

        Mail::to($user->email)->send(new WelcomeEmail($user));

        return "Email sent to " . $user->email;
    }
}


