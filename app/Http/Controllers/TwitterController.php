<?php

namespace App\Http\Controllers;

use App\Events\UserSocialEvent;
use App\Models\SocialUser;
use App\Presenters\TwitterShowUser;
use App\Services\Twitter\Contracts\TwitterInterface;

class TwitterController extends Controller
{
    public function showUser($user, SocialUser $socialUser)
    {
        $socialUser = $socialUser->findByUser($user);

        if ($socialUser) {
            return (new TwitterShowUser($socialUser))->get();
        }

        event(new UserSocialEvent(TwitterInterface::TWITTER_NAME, $user));

        return 'processing request';
    }
}
