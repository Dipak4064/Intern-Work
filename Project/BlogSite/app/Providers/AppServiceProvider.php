<?php

namespace App\Providers;

use App\Services\sendWelcomeEmail;
use App\Services\WelcomeEmailInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(WelcomeEmailInterface::class, SendWelcomeEmail::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('isloggedin', function () {
            return Auth::check();
        });
        Gate::define('isadmin', function () {
            $user = Auth::user();
            return $user->role === 'admin';
        });
    }
}
