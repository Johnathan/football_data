<?php

namespace Johnathan\FootballData;

use Illuminate\Support\ServiceProvider;

class FootballDataServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('football_data.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'football_data');

        // Register the main class to use with the facade
        $this->app->singleton('football_data', function () {
            return new FootballData(config('football_data.auth_token'));
        });
    }
}
