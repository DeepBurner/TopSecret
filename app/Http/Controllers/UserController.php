<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller {


    public function postSignUp(Request $request){

        $this->validate($request, [
            'email' => 'email|unique:users|required',
            'username' => 'required|unique:users|max:30',
            'password' => 'required|min:4'
        ]);

        $email = $request['email'];
        $username = $request['username'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->username = $username;
        $user->password = $password;

        $user->bio = '';
        $user->location = '';
        $user->name = '';

        $user->save();
        Auth::login($user);

        return redirect()->route('dashboard');

    }

    public function postSignIn(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            return redirect() -> route('dashboard');
        }
        return redirect()->back();
    }

    public function getLogout(){
        Auth::logout();
        return redirect() -> route('home');
    }

    public function getAccount(){
        return view('account_msg', ['user' => Auth::user()]);
    }

    public function getReal(){
        return view('account', ['user' => Auth::user()]);
    }

    public function postSaveAccount(Request $request){
        $this->validate($request, [
            'name' => 'max:30',
            'bio' => 'max:140',
            'location' => 'max:30'
        ]);
        $user = Auth::user();
        $user->name = $request['name'];
        $user->bio = $request['bio'];
        $user->location = $request['location'];
        $user->update();

        $file = $request->file('image');
        $filename = $request['username'] . '-' . $user->id . '.jpg';
        if($file){
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect() -> route('account');
    }

    public function getUserImage($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
}
