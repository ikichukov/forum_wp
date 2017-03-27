<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getTopic()
    {
        return $this->belongsTo('App\Topic', 'topic', 'id');
    }

    public function getUser()
    {
        return $this->hasOne('App\User', 'username', 'username');
    }
}
