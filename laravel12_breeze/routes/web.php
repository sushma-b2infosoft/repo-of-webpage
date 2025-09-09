<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/register',[AuthController::class,'registerForm'])->middleware('guest')->name('register');
Route::post('/register',[AuthController::class,'register'])->middleware('guest');
Route::get('/login',[AuthController::class,'loginForm'])->middleware('guest')->name('login');
Route::post('/login',[AuthController::class,'login'])->middleware('guest');

// Logout
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');

// Protected route
Route::get('/dashboard',function(){
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

// Breeze routes for password reset and email verification
require __DIR__.'/auth.php';

