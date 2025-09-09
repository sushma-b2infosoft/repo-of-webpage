<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // ✅ important

class UserController extends Controller
{
    // public function testEloquent()
    // {
    //     // STEP 1: Create
    //     $user = User::create([
    //         'name' => 'Varun',
    //         'email' => 'varun@test.com',
    //         'password' => bcrypt('123456'),
    //         // 'active' => 1
    //     ]);
    //     // dd($user); // ✅ Yeh ek baar run karo
    // }

    // public function showAllUsers()
    // {
    //     $allUsers = User::all();
    //     dd($allUsers);
    // }

    // public function activeNames()
    // {
    //     $names = User::where('active', 1)
    //                 ->orderBy('name')
    //                 ->pluck('name');
    //     dd($names);
    // }

    // public function updateUser()
    // {
    //     $user = User::find(1);
    //     $user->update(['name' => 'Varun Sharma']);
    //     dd($user);
    // }

    //public function deleteUser()
    // {
    //     $user = User::find(1);
    //     $user->delete();
    //     dd('User soft deleted!');
    // }

    // public function trashedUsers()
    // {
    //     $trashed = User::onlyTrashed()->get();
    //     dd($trashed);
    // }

    // public function restoreUser()
    // {
    //     $user = User::withTrashed()->find(1);
    //     $user->restore();
    //     dd($user);
    // }
 
    public function show($id)
    {
        // user ke saath profile fetch
        $user = User::with('profile')->findOrFail($id);

        return view('user.show', compact('user'));
    }
}

