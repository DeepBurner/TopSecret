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
	if (Auth::check())
	{
		return Redirect::to('/dashboard');
	}
    return view('welcome');
}) -> name('home');

Route::get('/register', function () {
	if (Auth::check())
	{
		return Redirect::to('/dashboard');
	}
    return view('register');
}) -> name('register');

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as'=> 'signup'
]);

Route::post('/search',[
    'uses' => 'SearchController@postSearchRequest',
    'as' => 'search',
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

Route::get('/user-image/{username}', [
    'uses' => 'UserController@getUserImage',
    'as' => 'account.image',
    'middleware' => 'auth'
]);

Route::get('/field-image/{fieldname}', [
    'uses' => 'FieldsController@getFieldImage',
    'as' => 'field.image'
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

Route::any('forum_redir', [
    'uses' => 'FieldsController@getForum',
    'as' => 'fieldforum'
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

Route::post('adduser', [
    'uses' => 'UserController@postPanelNewUser',
    'as' => 'panel.adduser'
]);

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
    Route::post('/', ['as' => 'messages.send', 'uses' => 'MessagesController@sendMessage']);
});

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
    'middleware' => 'auth'
]);

Route::get('/{username}', [
    'uses' => 'UserController@getAccount',
    'as' => 'account_real',
    'middleware' => 'auth'
]);

Route::get('/fields/{field_name}/sources/', [
    'uses' => 'SourcesController@getFieldSources',
    'as' => 'sources',
    'middleware' => 'auth'
]);

Route::get('/fields/{field_name}/sources/{id}', [
    'uses' => 'SourcesController@getFieldSection',
    'as' => 'sources.section',
    'middleware' => 'auth'
]);



