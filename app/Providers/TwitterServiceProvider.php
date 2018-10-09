<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TwitterServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->configure('twitter');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(
            \App\Services\Twitter\Contracts\TwitterInterface::class,
            \App\Services\Twitter\Manager::class
        );
    }
}
