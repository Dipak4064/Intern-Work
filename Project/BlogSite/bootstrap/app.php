<?php

use App\Http\Middleware\checkExpiryDate;
use App\Http\Middleware\checkPayment;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isLoggedin;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias(['isLoggedin' => isLoggedin::class]);
        $middleware->alias(['isAdmin' => isAdmin::class]);
        $middleware->alias(['checkPayment' => checkPayment::class]);
        $middleware->alias(['checkExpiryDate' => checkExpiryDate::class]);
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
