<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $req) {
        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            $user = Auth::user();
            $user->is_active = true;
            $user->last_login_at = now();
            $user->save();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Email ya password galat hai'])->withInput();
    }

    public function logout(Request $req) {
        $user = Auth::user();
        if ($user) {
            $user->is_active = false;
            $user->save();
        }
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/login');
    }

    // optional: register route to create employee
    public function showRegister(){ return view('auth.register'); }
    public function register(Request $req){
        $data = $req->validate([
            'name'=>'required',
            'email'=>'required|email|unique:employees,email',
            'password'=>'required|confirmed|min:6'
        ]);
        $data['password'] = Hash::make($data['password']);
        $emp = Employee::create($data);
        Auth::login($emp);
        return redirect('/dashboard');
    }
}

