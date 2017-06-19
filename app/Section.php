<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function field(){
        return $this->belongsTo('App\Field');
    }
}
