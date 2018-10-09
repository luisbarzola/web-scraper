<?php

namespace App\Events;

class UserSocialEvent extends Event
{
    public $source;
    public $userId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($source, $userId)
    {
        $this->source = $source;
        $this->userId = $userId;
    }
}
