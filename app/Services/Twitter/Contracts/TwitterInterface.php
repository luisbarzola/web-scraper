<?php

namespace App\Services\Twitter\Contracts;

interface TwitterInterface
{
    const TWITTER_NAME = 'twitter';

    /**
     * @param $id
     *
     * @return mixed
     */
    public function showUser($id);
}