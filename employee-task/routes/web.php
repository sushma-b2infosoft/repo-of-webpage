<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;

Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login'])->name('login.post');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::resource('tasks', TaskController::class);
    Route::resource('projects', ProjectController::class)->except(['show']); // optional
});
Route::get('/', fn()=> redirect('/login'));
