<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Field extends Model
{
    use Searchable;

    public $timestamps = false;

    public function users(){
        return $this->belongsToMany('App\User', 'user_field');
    }

    public function sections(){
        return $this->hasMany('App\Section');
    }

    public function searchableAs() {
        return 'fields_index';
    }
}
