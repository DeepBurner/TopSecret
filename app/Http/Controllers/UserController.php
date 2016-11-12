<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function postSignUp(Request $request){


        $email = $request['email'];

        $username = $request['username'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user -> email = $email;
        $user -> username = $username;
        $user -> password = $password;

        $user -> save();

        return redirect();

    }

    public function postSignIn(){

    }
}
