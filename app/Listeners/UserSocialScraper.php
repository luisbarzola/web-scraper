<?php

namespace App\Listeners;

use App\Events\UserSocialEvent;
use App\Models\SocialUser;
use App\Services\SocialManager;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class UserSocialScraper implements ShouldQueue
{
    public $queue = 'scraper';

    protected $socialManager;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(SocialManager $socialManager)
    {
        $this->socialManager = $socialManager;
    }

    /**
     * @param UserSocialEvent $event
     *
     * @throws \Exception
     */
    public function handle(UserSocialEvent $event)
    {
        try {
            $data = $this->socialManager->with($event->source)->showUser($event->userId);
        } catch (\Exception $exception) {
            Log::error('Error in UserSocialScraper: source:' . $event->source . ' userId:' . $event->userId);
            throw $exception;
        }

        SocialUser::updateOrCreate([
            'user_id' => $event->userId,
            'source' => $event->source,
        ], [
            'result' => (array) $data,
        ]);
    }
}
