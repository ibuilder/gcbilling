php
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectApiController;
use App\Http\Controllers\Api\PayappApiController; // Import the new controller

Route::middleware('auth:api')->group(function () {
    Route::resource('projects', ProjectApiController::class);
    Route::resource('payapps', PayappApiController::class); // Add resource routes for payapps
});