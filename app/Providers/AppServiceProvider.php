<?php

namespace App\Providers;

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
    if ($this->app->environment('production')) {
        \URL::forceScheme('https');
    }
    if (\DB::table('users')->count() === 0) {
        \Artisan::call('db:seed', ['--force' => true]);
    }
}
}
