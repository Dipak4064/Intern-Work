<?php

use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\checkPayment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isLoggedin;

Route::get('/', [UserController::class, 'landing'])->name('landing');

Route::get('/getprice', function () {
    return view('pricing');
})->name('getprice');

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
Route::delete('destroypost/{id}', [UserController::class, 'destroy'])->name('post.destroy')->middleware(['can:isloggedin']);
Route::get('/trash/index', [UserController::class, 'trash'])->name('trash.index')->middleware('can:isadmin');
Route::get('/post/restore/{id}', [UserController::class, 'restore'])->name('post.restore')->middleware('can:isadmin');
Route::delete('/permanent/destroy/{id}', [UserController::class, 'permanentDestroy'])->name('permanent.destroy')->middleware('can:isadmin');
Route::get('/post/restore/{id}', [UserController::class, 'restore'])->name('post.restore')->middleware('can:isadmin');

Route::get('/admin', [UserController::class, 'adminIndex'])->name('admin.index')->middleware('can:isadmin');
Route::get('/search', [UserController::class, 'search'])->name('search');

Route::post('/subscribe', [UserController::class, 'subscribe'])->name('subscribe')->middleware(isLoggedin::class);
Route::get('paymentSuccess', [UserController::class, 'paymentSuccess'])->name('payment.success');
Route::get('paymentFailure', [UserController::class, 'paymentFailure'])->name('payment.failure');
Route::post('/try-again', [UserController::class, 'subscribe'])->name('payment.retry')->middleware('can:isloggedin');

Route::get('/extra-features', function () {
    return view('extra_features');
})->name('extra.features');

Route::get('/chat', function () {
    return view('chat');
})->name('chat')->middleware([isLoggedin::class, checkPayment::class]);


Route::get('/video', function () {
    return view('video');
})->name('video')->middleware([isLoggedin::class, checkPayment::class]);


Route::get('/error', function () {
    return view('errors.error');
})->name('error');