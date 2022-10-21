<?php

namespace Andreslqr\Components;

use Illuminate\Support\ServiceProvider;


class ComponentsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'laravel-components');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', $this->app->config['laravel-components.prefix']);

        if($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('laravel-components.php')
            ], 'config');

            $this->publishes([
                __DIR__ . '/../dist' => public_path($this->app->config['laravel-components.prefix'])
            ], 'assets');
        }
        
    }
}