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
        $this->publishes([
            __DIR__.'/../../resources/assets' => resource_path('assets/vendor/chat-app-laravel')
        ], 'vue-assets');
    }

    /**
     * Register Routes and other stuff
     */
    public function register()
    {

    }
}