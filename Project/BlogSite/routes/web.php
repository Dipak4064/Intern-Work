<?php

use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'landing'])->name('landing');

Route::get('/getprice', function () {
    return view('pricing');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('can:isloggedin');

Route::resource('signup', SignupController::class);
Route::resource('signin', SigninController::class);

Route::get('/createpost', function () {
    return view('createpost');
})->name('posts.create')->middleware('can:isloggedin');

Route::post('storepost', [UserController::class, 'store'])->name('posts.store')->middleware('can:isloggedin');
Route::get('posts', [UserController::class, 'yourposts'])->name('posts.index')->middleware('can:isloggedin');
Route::get('post/{id}', [UserController::class, 'showpost'])->name('post.show')->middleware('can:isloggedin');

Route::get('updatepost/{id}', function ($id) {
    $post = Post::findOrFail($id);
    Gate::authorize('isloggedin');
    if ($post->user_id !== Auth::id() && !Gate::allows('isadmin')) {
        abort(403, 'Unauthorized action.');
    }
    return view('updatepost', compact('post'));
})->name('updatepost');

Route::PUT('postedit/{id}', [UserController::class, 'edit'])->name('post.update');
Route::get('destroypost/{id}', [UserController::class, 'destroy'])->name('post.destroy')->middleware(['can:isloggedin', 'can:isadmin']);

Route::get('/admin', [UserController::class, 'adminIndex'])->name('admin.index')->middleware('can:isadmin');


Route::get('/search',[UserController::class,'search'])->name('search');