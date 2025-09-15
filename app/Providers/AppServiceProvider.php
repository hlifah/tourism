<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Only allow access to Filament for this specific email
        Gate::define('viewFilament', function ($user) {
            return $user->email === 'asma@gmail.com';
        });
    }
}
