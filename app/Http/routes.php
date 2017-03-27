<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::get('/users/validation/{validation}', 'UsersController@validation');
    Route::get('/users/{users}/control-panel/edit-details', 'UsersController@editDetails');
    Route::post('/users/{users}/control-panel/edit-details', 'UsersController@saveEditedDetails');
    Route::get('/users/{users}/control-panel/edit-avatar', 'UsersController@editAvatar');
    Route::post('/users/{users}/control-panel/edit-avatar', 'UsersController@uploadAvatar');
    Route::get('/users/{users}/control-panel/edit-signature', 'UsersController@editSignature');
    Route::post('/users/{users}/control-panel/edit-signature', 'UsersController@updateSignature');
    Route::get('/users/{users}/control-panel/edit-email', 'UsersController@editEmail');
    Route::post('/password/{users}/change', 'UsersController@updatePassword');
    Route::get('/forums/{forums}', 'ForumsController@show');
    Route::get('/forums/{forums}/topics/create', 'TopicsController@create');
    Route::post('/forums/{forums}/topics/store', 'TopicsController@store');
    Route::get('/forums/{forums}/topics/{topics}', 'TopicsController@show');
    Route::get('/forums/{forums}/topics/{topics}/posts/create', 'PostsController@create');
    Route::post('/forums/{forums}/topics/{topics}/posts/store', 'PostsController@store');
    Route::post('/forums/{forums}/topics/{topics}/posts/update/{posts}', 'PostsController@update');
    Route::get('/forums/{forums}/topics/{topics}/posts/edit/{posts}', 'PostsController@edit');
    Route::get('/posts/{posts}', 'PostsController@show');
    Route::get('{anything}', function(){
        return redirect('/');
    });

    #############################
    ## ROUTES USED FOR TESTING ##
    #############################

    Route::get('/pagination', function() {
        return view('layouts._pagination', ['url' => 'example', 'page' => 1, 'count' => 3]);
    });
    Route::get('/users/{users}', 'UsersController@show');
    Route::get('/users/{users}/visitor-messages/{senders}', 'VisitorMessagesController@show');
    Route::post('/users/{users}/visitor-messages/{senders}', 'VisitorMessagesController@store');
    Route::get('/users/{users}/profile/add-friend/{friends}', 'UsersController@addFriend');
    Route::get('/timeline/{users}/{senders}', 'VisitorMessagesController@timeline');
    Route::get('/test', function(){
        return view('sidebar');
    });
});

Route::group(['middleware' => 'web'], function () {
});
