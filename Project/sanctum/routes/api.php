
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
Route::post('/register', [UserController::class, 'register']);
Route::middleware('auth:sanctum')->group(function(){
    Route::resource('posts', PostController::class);
});