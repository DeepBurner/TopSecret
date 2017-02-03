<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\User;
use Cmgmyr\Messenger\Models\Thread;
class ExtThread extends Thread{

    public function __construct(Thread $thread)
    {
        foreach($thread as $property => $value) {
            $this->$property = $value;
        }
    }

    public function getReceiver(){
        $users = $this->participants()->withTrashed()->select('user_id')->get()->map(function ($participant) {
            return $participant->user_id;
        });

        $userarray = $users->toArray();

        foreach($users as $userid){
            if($userid != Auth::id()){
                return User::where('id', $userid)->first()->username;
            }
        }

        return null;
    }

}