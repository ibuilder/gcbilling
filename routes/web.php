<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/staffs/export', [StaffController::class, 'export'])->name('staffs.export');
Route::get('/projects/export', [ProjectController::class, 'export'])->name('projects.export');


require __DIR__.'/auth.php';
