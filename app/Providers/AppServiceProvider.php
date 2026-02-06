<?php

namespace App\Providers;

use App\Domain\Repositories\Productivity\ProductivityRepository;
use App\Infra\Databases\Eloquent\Repositories\EloquentProductivityRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ProductivityRepository::class,
            EloquentProductivityRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
