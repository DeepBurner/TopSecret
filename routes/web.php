<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::post('/signup', [
        'uses' => 'UserController@postSignUp',
        'as'=> 'signup'
    ]);
});
*/

Route::get('/', function () {
    return view('welcome');
}) -> name('home');


Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as'=> 'signup'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as'=> 'signin'
]);

Route::get('/dashboard', [
    'uses' => 'PostController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);

Route::post('createpost', [
    'uses' => 'PostController@postCreatePost',
    'as' => 'post.create',
    "middleware" => 'auth'
]);

Route::get('/delete-post/{post_id}', [
    "uses" => "PostController@getDeletePost",
    "as" => "post.delete",
    "middleware" => 'auth'
]);

Route::get('/logout', [
   'uses' => 'UserController@getLogout',
    'as' => 'logout'
]);

Route::post('/edit', function (\Illuminate\Http\Request $request) {
    return response()->json(['message' => $request['postId']]);
})->name('edit');


