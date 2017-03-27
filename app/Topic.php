<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Post', 'topic', 'id');
    }

    public function getForum()
    {
        return $this->belongsTo('App\Forum', 'forum', 'name');
    }

    public function latest_post()
    {
        return $this->hasOne('App\Post', 'id', 'post_id');
    }

    public function getUser()
    {
        return $this->hasOne('App\User', 'username', 'username');
    }
}
