<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    public function topics()
    {
        return $this->hasMany('App\Topic', 'forum', 'name');
    }

    public function getCategory()
    {
        return $this->belongsTo('App\Category', 'category', 'name');
    }

    public function posts()
    {
        return $this->hasMany('App\Post', 'forum', 'name');
    }

    public function latest_post()
    {
        return $this->hasOne('App\Post', 'id', 'post_id');
    }
}
