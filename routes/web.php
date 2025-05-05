<?php

use App\Http\Controllers\StaffController;
use App\Http\Controllers\PayappController;
use App\Http\Controllers\ChangeOrderController;
use App\Http\Controllers\GeneralConditionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SovController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Project Routes
Route::resource('projects', ProjectController::class);
// SOV Routes
Route::resource('sovs', SovController::class);
// Payapp Routes
Route::resource('payapps', PayappController::class);
// Change Order Routes
Route::resource('change-orders', ChangeOrderController::class);
// General Conditions Routes
Route::resource('general-conditions', GeneralConditionController::class);
// Staff Routes
Route::resource('staffs', StaffController::class);

