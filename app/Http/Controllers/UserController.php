<?php

namespace app\http\controllers;

use app\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function postSignUp(Request $request){
        $email = $request['email'];
        $username = $request['username'];
        $password = bcrypt($request['email']);

        $user = new User();
        $user -> email = $email;
        $user -> username = $username;
        $user -> password = $password;

        $user -> save();

        return redirect() -> back();
    }

    public function postSignIn(){

    }
}
