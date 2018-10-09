<?php

namespace App\Presenters;

use App\Models\SocialUser;

class TwitterShowUser implements Presenter
{
    /**
     * @var SocialUser
     */
    protected $model;

    public function __construct(SocialUser $model)
    {
        $this->model = $model;
    }

    public function get()
    {
        $data = $this->model->result;

        return [
            'name' => $data['name'],
            'description' => $data['description'],
            'image_url' => str_replace('_normal', '', $data['profile_image_url']),
            'popularity' => $data['followers_count'],
        ];
    }
}