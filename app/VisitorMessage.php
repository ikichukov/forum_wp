<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitorMessage extends Model
{
    public function sender()
    {
        return $this->hasOne('App\User', 'username', 'username_from');
    }

    public function receiver()
    {
        return $this->hasOne('App\User', 'username', 'username_to');
    }
}
