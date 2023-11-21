<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('admin', function (User $users) {
            return ($users->role === 'admin');
        });

        Gate::define('pimpinan', function (User $users) {
            return ($users->role === 'pimpinan');
        });

        Gate::define('bendahara', function (User $users) {
            return ($users->role === 'bendahara');
        });

        Gate::define('warga', function (User $users) {
            return ($users->role === 'warga');
        });

        Gate::define('AdPimBen', function (User $users) {
            return ($users->role === 'admin' or $users->role === 'pimpinan' or $users->role === 'bendahara');
        });

        Gate::define('AdBen', function (User $users) {
            return ($users->role === 'admin' or $users->role === 'bendahara');
        });
    }
}
