<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
