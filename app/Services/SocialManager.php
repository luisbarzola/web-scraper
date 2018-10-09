<?php

namespace App\Services;

use App\Services\Twitter\Contracts\TwitterInterface;

class SocialManager
{
    public function with($source)
    {
        switch ($source) {
            case TwitterInterface::TWITTER_NAME:
                return app(TwitterInterface::class);
            default:
                throw new \Exception('Source unsupported');
        }
    }
}