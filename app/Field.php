<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function users(){
        return $this->belongsToMany('App\User', 'user_field')->withTimestamps();
    }
}
