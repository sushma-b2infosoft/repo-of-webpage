<?php

// use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\FileController;
// use App\http\Controllers\EmailController;

// Route::get('/upload', [FileController::class, 'showForm']);
// Route::post('/upload', [FileController::class, 'uploadFile'])->name('file.upload');
// Route::get('/send-email', [EmailController::class, 'sendEmail']);
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

Route::get('/upload', [FileController::class, 'showForm'])->name('upload.form');
Route::post('/upload', [FileController::class, 'uploadFile'])->name('upload.file');
