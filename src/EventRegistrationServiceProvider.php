<?php

namespace JakeRw\EventRegistration;

use Illuminate\Support\ServiceProvider;

class EventRegistrationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'event-registration');
        $this->loadViewsFrom(__DIR__.'/resources/views/', 'event-registration');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/backend/registration.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('event-registration.php'),
            ], 'config');



            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views/' => resource_path('views/vendor/event-registration'),
            ], 'views');

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/event-registration'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/event-registration'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'event-registration');

        // Register the main class to use with the facade
        $this->app->singleton('event-registration', function () {
            return new EventRegistration;
        });

        require_once(__DIR__.'/Helpers/Helpers.php');
    }
}
