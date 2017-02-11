<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;

class UserController extends Controller {


    public function postSignUp(Request $request){

        $this->validate($request, [
            'register-email' => 'email|unique:users,email|required',
            'register-username' => 'required|unique:users,username|max:30',
            'register-password' => 'required|min:4'
        ]);

        $email = $request['register-email'];
        $username = $request['register-username'];
        $password = bcrypt($request['register-password']);

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
            'login-email' => 'required',
            'login-password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['login-email'], 'password' => $request['login-password']])){
            return redirect() -> route('dashboard');
        }
        return redirect()->back();
    }

    public function getLogout(){
        Auth::logout();
        return redirect() -> route('home');
    }

    public function getAccountSet(){
        return view('account_msg', ['user' => Auth::user()]);
    }

    public function getAccount($username){
        $userToDisplay = User::where('username', $username)->first();
        return view('account', ['user' => $userToDisplay]);
    }

    public function postSaveAccount(Request $request){
        $this->validate($request, [
            'name' => 'max:30',
            'bio' => 'max:140',
            'location' => 'max:30',
			'image' => 'image|mimes:jpeg,png|max:1024'
        ]);
        $user = Auth::user();
		$file = $request->file('image');

        $user->name = $request['name'];
        $user->bio = $request['bio'];
        $user->location = $request['location'];
        $user->update();
		
        if($file){
			$jpgFilePath = '/user-images/' . $user->username . '-' . $user->id . '.jpg';
			$pngFilePath = '/user-images/' . $user->username . '-' . $user->id . '.png';
						
			// Delete current image
			if (Storage::disk('local')->has($jpgFilePath)) {
				Storage::delete($jpgFilePath);
			}
			else if (Storage::disk('local')->has($pngFilePath)) {
				Storage::delete($pngFilePath);
			}
			
			// Manipulate new image
			$newImage = Image::make(Input::file('image'));
			$ratio = $newImage->height() / $newImage->width();
			
			if ($newImage->width() > $newImage->height()) {
				$newImage->resize(128, 128 * $ratio);
			}
			else {
				$newImage->resize(128 / $ratio, 128);
			}
			
			// Upload new image
			if ($file->getMimeType() == 'image/jpeg') {
				Storage::disk('local')->put($jpgFilePath, $newImage->stream()->__toString());
			}
			else if ($file->getMimeType() == 'image/png') {
				Storage::disk('local')->put($pngFilePath, $newImage->stream()->__toString());
			}
        }
        return redirect() -> route('account');
    }

    public function getUserImage($username){
		$user = User::where('username', $username)->first();
		$filePath = '/user-images/default.png';
				
		if ($user) {
			$jpgFilePath = '/user-images/' . $user->username . '-' . $user->id . '.jpg';
			$pngFilePath = '/user-images/' . $user->username . '-' . $user->id . '.png';
		
			if (Storage::disk('local')->has($jpgFilePath)) {
				$filePath = $jpgFilePath;
			}
			else if (Storage::disk('local')->has($pngFilePath)) {
				$filePath = $pngFilePath;
			}
		}
		
		return Storage::disk('local')->get($filePath);
    }

    public function getAdminPanel(){
        if(Auth::user() == null || Auth::user()->user_level != 'admin'){
            return redirect()->back();
        }
        return view('adminpanel');
    }
}
