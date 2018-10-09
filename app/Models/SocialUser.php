<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialUser extends Model
{
    protected $fillable = ['id', 'user_id', 'source', 'result'];

    protected $casts = [
        'result' => 'collection'
    ];

    public function findByUser($user)
    {
        return $this->where('user_id', $user)->first();
    }
}