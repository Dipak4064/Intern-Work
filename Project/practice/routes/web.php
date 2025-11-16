<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loginpage', function () {
    return view('login');
})->name('loginPage');
Route::get('/extraFeature', [UserController::class, 'extraFeature'])->name('extraFeature')->middleware('extraFeature');

Route::get('/signuppage', function () {
    return view('create');
})->name('signupPage');

Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('loginPage')->with('success', 'Logged out successfully.');
})->name('logout');

Route::post('/post', [UserController::class, 'postregister'])->name('posts.store');
Route::get('/postpage', function () {
    return view('post');
})->name('postPage');

Route::get('/landingpage', function () {
    $posts = Post::all();
    return view('landingPage', compact('posts'));
})->name('landingPage')->middleware('extraFeature');

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('esewa', function () {
    return view('esewa');
})->name('esewa');
Route::post('/subscription', [UserController::class, 'subscription'])->name('payment.subscription');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('loginPage')->with('success', 'Logged out successfully.');
})->name('logout');