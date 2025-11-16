<?php

namespace App\Providers;

use App\Services\sendWelcomeEmail;
use App\Services\WelcomeEmailInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(WelcomeEmailInterface::class, SendWelcomeEmail::class);
    }
    public function boot(): void
    {
        Gate::define('isloggedin', function () {
            return Auth::check();
        });
        Gate::define('isadmin', function () {
            $user = Auth::user();
            return $user->role === 'admin';
        });
        Gate::define('editor', function ($user) {
            return $user->hasRole('editor');
        });
        Gate::define('isadmin-or-editor', function ($user) {
            return $user->hasRole('admin') || $user->hasRole('editor');
        });
    }
}
