<?php

use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::resource('signup', SignupController::class);
Route::resource('signin', SigninController::class);
