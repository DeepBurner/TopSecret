<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use Messagable;
    use Searchable;

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function blogposts(){
        return $this->hasMany('App\BlogPost');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function fields(){
        return $this->belongsToMany('App\Field', 'user_field');
    }

    public function searchableAs() {
        return 'users_index';
    }
}
