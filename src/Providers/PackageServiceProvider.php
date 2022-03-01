<?php

namespace SabihOD\ChatPackageLaravel\Providers;


use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Publish files
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // php artisan vendor:publish --provider="SabihOD\ChatPackageLaravel\Providers\PackageServiceProvider" {tag}

            // --tag="config"
            $this->publishes([
                __DIR__ . '/../../config/config.php' => config_path('chatpackage.php'),
            ], 'config');

            // --tag="vue-assets"
            $this->publishes([
                __DIR__ . '/../../resources/assets' => resource_path('assets/vendor/chat-app-laravel')
            ], 'vue-assets');

            // --tag="migrations"
            $this->publishes([
                __DIR__ . '/../../database/migrations/create_channels_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_channels_table.php'),
            ], 'migrations');
        }
    }

    /**
     * Register Routes and other stuff
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'chatpackage');
    }
}