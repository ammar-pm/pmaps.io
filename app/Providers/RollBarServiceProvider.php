<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RollBarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // enabling rollbar for only production
        if ($this->app->environment('production') or $this->app->environment('staging')) {
            $this->app->register(\Jenssegers\Rollbar\RollbarServiceProvider::class);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
