<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',function(){
    return Auth::user()->test();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//image profile user

Route::post('upload', 'DashboardController@saveImg');

//Profile Update User
Route::get('profile/{slug}', 'ProfileController@profile');
Route::post('updateuser', 'ProfileController@updateuser');

//upload cover pic
Route::post('upload/cover','ProfileController@coverpic');

Route::get('posts','PostController@index');
Route::get('posts/display','PostController@posts');
Route::post('addpost', 'PostController@addpost');
 Route::get('deletepost/{id}','PostController@deletepost');
Route::post('postImg', 'PostController@saveImg');

Route::get('LikePost/{id}', 'PostController@LikePost');

//Comment Post Route
 Route::post('addcomments','CommentController@addcomments');
 
 Route::post('forgot/password','UserController@forgotPassword')->name('forgot');
 Route::get('sendEmailDone/{email}/{verifyToken}','UserController@resetPassword');
 Route::post('reset','UserController@setpassword');


Route::get('friends/{slug}','FriendshipController@findfriends');
Route::get('friends/images','FriendshipController@myfriendsimages');
Route::get('addFriend/{id}','FriendshipController@addFriend');
Route::get('requestes','FriendshipController@requestes');
Route::get('confirm/request/{slug}/{id}','FriendshipController@confirmrequest');
Route::get('friendlist','FriendshipController@friendlist');


Route::get('notifications/{id}','NotificationController@getfriend');

