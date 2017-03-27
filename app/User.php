<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function received_visitor_messages()
    {
        return $this->hasMany('App\VisitorMessage', 'username_to', 'username');
    }

    public function sent_visitor_messages()
    {
        return $this->hasMany('App\VisitorMessage', 'username', 'username_from');
    }

    public function friends()
    {
        return $this->hasMany('App\Friend', 'username', 'friend1');
    }

    public function posts()
    {
        return $this->hasMany('App\Post', 'username', 'username');
    }
}
