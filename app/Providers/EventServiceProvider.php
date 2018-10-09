<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserSocialEvent' => [
            'App\Listeners\UserSocialScraper',
        ],

        'App\Events\WebScraperFinished' => [
            'App\Listeners\SaveDataScraper',
            'App\Listeners\ClientNotification',
        ],
    ];
}
