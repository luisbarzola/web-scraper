<?php

namespace App\Services\Twitter;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Services\Twitter\Contracts\TwitterInterface;

class Manager implements TwitterInterface
{
    /**
     * @var TwitterOAuth
     */
    protected $connection;

    public function __construct()
    {
        $this->connection = new TwitterOAuth(
            config('twitter.key'), config('twitter.secret_key'),
            config('twitter.access_token'),
            config('twitter.access_token_secret')
        );
    }

    public function showUser($screenName)
    {
        return $this->connection->get("users/show", ["screen_name" => $screenName]);
    }
}