<?php

declare(strict_types=1);

namespace App\Providers;

use App\Interfaces\Weather;
use App\Services\WttrinService;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            Weather::class,
            WttrinService::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
