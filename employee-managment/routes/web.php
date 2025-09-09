<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return auth()->check()
        ? redirect('/dashboard')
        : redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});
use App\Http\Controllers\StatusController;
use App\Http\Controllers\HolidayController;

Route::middleware(['auth'])->group(function () {
    Route::get('/status', [StatusController::class, 'index'])->name('status.index');
    Route::post('/status', [StatusController::class, 'store'])->name('status.store');

    Route::get('/holiday', [HolidayController::class, 'index'])->name('holiday.index');
    Route::post('/holiday', [HolidayController::class, 'store'])->name('holiday.store');
});
// use App\Http\Controllers\StatusController;
use App\Http\Controllers\LeaveController;
// use App\Http\Controllers\HolidayController;

Route::get('/status', [StatusController::class, 'index'])->name('status.index');
Route::post('/status', [StatusController::class, 'store'])->name('status.store');

Route::get('/leaves', [LeaveController::class, 'index'])->name('leaves.index');
Route::post('/leaves', [LeaveController::class, 'store'])->name('leaves.store');

Route::get('/holidays', [HolidayController::class, 'index'])->name('holidays.index');


// 👇 Add this line so login/register routes work
require __DIR__.'/auth.php';


