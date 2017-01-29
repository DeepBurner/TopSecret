<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public $timestamps = false;

    public function users(){
        return $this->belongsToMany('App\User', 'user_field');
    }
}
