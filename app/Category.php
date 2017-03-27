<?php

namespace App;
use App\Forum;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function forums()
    {
        return $this->hasMany('App\Forum', 'category', 'name');
    }

    public function topics()
    {
        return $this->hasMany('App\Topic', 'category', 'name');
    }

    public function posts()
    {
        return $this->hasMany('App\Post', 'category', 'name');
    }

}
