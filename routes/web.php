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

Route::get('/register', function () {
    return view('register');
}) -> name('register');

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
    'as' => 'logout',
]);

Route::get('/account_settings', [
    'uses' => 'UserController@getAccountSet',
    'as' => 'account',
    'middleware' => 'auth'
]);

Route::post('/updateaccount', [
    'uses' => 'UserController@postSaveAccount',
    'as' => 'account.save',
    'middleware' => 'auth'
]);

Route::get('/userimage/{filename}', [
    'uses' => 'UserController@getUserImage',
    'as' => 'account.image',
    'middleware' => 'auth'
]);

Route::post('/edit', [
    'uses' => 'PostController@postEditPost',
    'as' => 'edit',
    'middleware' => 'auth'
]);

Route::post('/like', [
   'uses' => 'PostController@postLikePost',
    'as' => 'like',
    'middleware' => 'auth'
]);

Route::get('/adminpanel', [
    'uses' => 'UserController@getAdminPanel',
    'as' => 'adminpnl',
    'middleware' => 'auth'
]);

Route::post('addfield', [
    'uses' => 'FieldsController@postAddField',
    'as' => 'panel.addfield'
]);

Route::post('addblogpost', [
    'uses' => 'BlogPostController@postNewBlogPost',
    'as' => 'panel.addblogpost'
]);

Route::get('/fields/{field_name}', [
    "uses" => "FieldsController@getFieldPage",
    "as" => "field"
]);

Route::get('/blog', [
    'uses' => 'BlogPostController@getBlog',
    'as' => 'blog'
]);


Route::get('/catalog',[
    'uses' => 'FieldsController@getCatalog',
    'as' => 'catalog',
    'middlewate' => 'auth'
]);

Route::post('sub_unsub',[
    'uses' => 'FieldsController@getSub',
    'as' => 'sub_unsub',
    'middlewate' => 'auth'
]);


Route::get('/{username}', [
    'uses' => 'UserController@getAccount',
    'as' => 'account_real',
    'middleware' => 'auth'
]);