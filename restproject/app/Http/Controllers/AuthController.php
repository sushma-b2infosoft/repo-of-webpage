<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;   // ✅ add this line

class AuthController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(RegisterUserRequest $request)
    {
        // Validation already done by RegisterUserRequest
        // For now just return success message
        return redirect()->route('register.form')->with('success', 'Registered successfully!');
    }
}

    // public function showForm()
    // {
    //     return view('register');
    // }

    // // Handle register form POST
    // public function register(Request $request)
    // {
    //     // Dump all submitted data
    //     dd($request->all());

    //     // After processing, redirect back with success message
    //     return redirect()->route('register.form')->with('success', 'Form submitted successfully!');
    // }

    

