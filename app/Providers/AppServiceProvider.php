<?php

namespace App\Providers;

use App\Models\Driving;
use App\Observers\DrivingObserver;
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
        Driving::observe(DrivingObserver::class);
    }
}
