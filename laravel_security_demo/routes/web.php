<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::post('/post', [PostController::class, 'store']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::get('/user/{user}', [UserController::class, 'show']);

