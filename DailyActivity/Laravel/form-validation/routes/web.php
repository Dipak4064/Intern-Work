<?php

use App\Http\Controllers\userValidationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/addUser', [userValidationController::class, 'addUser'])->name('addUser');
