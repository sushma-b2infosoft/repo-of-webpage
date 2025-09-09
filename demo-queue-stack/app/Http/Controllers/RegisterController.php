<?php

namespace App\Http\Controllers;

use App\Jobs\WriteToLogJob;
use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // ✅ Validation
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // ✅ User create
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // ✅ Job dispatch
        WriteToLogJob::dispatch("New user registered: " . $user->email);

        // ✅ Event fire
        event(new UserRegistered($user));

        // ✅ Notification send
        $user->notify(new \App\Notifications\WelcomeNotification());

        // ✅ Broadcast bhi fire kar do
        event(new \App\Events\TestBroadcastEvent("New user registered: " . $user->name));

        return "User registered successfully!";
    }
}
