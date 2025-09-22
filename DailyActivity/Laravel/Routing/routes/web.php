<?php

use Illuminate\Support\Facades\Route;
//php artisan route:list --except-vendor
//php artisan route:list --path=post
//php artisan route:list --name=admin

Route::get('/', function () {
    return view('welcome');
});

//route parameter & constraint
/*constraints of route 
1. (whereNumber('id')), 
2. (whereAlpha('name')),
3. (whereAlphaNumeric('name')), 
4. whereIn('category',['movie','song']), 
5. where('id', '[@0-9]+')
*/

// Route::get('/post', function () {
//     return view('post');
// });
// Route::view('/post', 'post');
Route::get('/post/{id}', function ($id) {
    return "<h1>post id: " . $id . "</h1>";
})->whereNumber('id');

/* Named Routes */
Route::view('/post', 'post')->name('post');
Route::view('/first', 'first');
Route::view('/second', 'second');
Route::view('/third', 'third');
Route::redirect('/p', '/post', 301);

/* Grouped route */
Route::prefix('page')->group(function () {
    Route::get('/post/{id}', function ($id) {
        return "<h1>my id: " . $id . "</h1>";
    });
    Route::get('/post', function () {
        return "<h1>I am the Post page!</h1>";
    });
    Route::get('/view', function () {
        return "<h1>I am the view page.</h1>";
    });
});


Route::fallback(function () {
    return view('pagenotfound');
});