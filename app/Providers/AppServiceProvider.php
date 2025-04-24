<?php

namespace App\Providers;

use App\Helpers\RoleHelper;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Blade::if('role', fn($role) => auth()->check() && RoleHelper::is($role));

        // Blade::if('anyrole', function (...$roles) {
        //     return !empty(array_intersect($roles, session('session_roles', [])));
        // });

        Blade::if('anyrole', fn($roles) => auth()->check() && RoleHelper::isAny((array) $roles));
    }
}
