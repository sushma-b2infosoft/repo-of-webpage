<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;
// use Illuminate\Support\Facades\Hash;

// class AuthController extends Controller
// {
//     public function register(Request $request)
//     {
//         $data = $request->validate([
//             'name'     => 'required|string|max:255',
//             'email'    => 'required|string|email|unique:users',
//             'password' => 'required|string|min:6|confirmed',
//         ]);

//         $user = User::create([
//             'name'     => $data['name'],
//             'email'    => $data['email'],
//             'password' => bcrypt($data['password']),
//         ]);

//         return response()->json(['message' => 'User registered']);
//     }

//     public function login(Request $request)
//     {
//         $credentials = $request->validate([
//             'email'    => 'required|email',
//             'password' => 'required',
//         ]);

//         $user = User::where('email', $credentials['email'])->first();

//         if (!$user || !Hash::check($credentials['password'], $user->password)) {
//             return response()->json(['message' => 'Invalid credentials'], 401);
//         }

//         $token = $user->createToken('api_token')->plainTextToken;

//         return response()->json(['token' => $token]);
//     }

//     public function logout(Request $request)
//     {
//         $request->user()->tokens()->delete();
//         return response()->json(['message' => 'Logged out']);
//     }
// }

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ✅ Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }

    // ✅ Login & Token Generate
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user
        ]);
    }

    // ✅ Logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully'
        ]);
    }
}
