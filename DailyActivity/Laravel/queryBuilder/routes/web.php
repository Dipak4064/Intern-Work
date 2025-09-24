<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'showUsers');
    Route::get('/user/{id}', 'singleUser')->name('view.user');
    Route::post('/add', 'addUser')->name('addUser');

    Route::PUT('/update/{id}', 'updateUser')->name('update');
    Route::get('/update/{id}', 'updatepage')->name('edit.user');
    // Route::put('/update/{id}', 'editUser')->name('edit.user');

    Route::get('/delete/{id}', 'deleteUser')->name('delete.user');
    Route::get('/deleteAll', 'deleteAllUsers')->name('deleteAll');
});

Route::view('/newuser', 'newForm');