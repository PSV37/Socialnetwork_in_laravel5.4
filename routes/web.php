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



Route::group(['middleware'=>['auth']],function (){
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
Route::get('DislikePost/{id}', 'PostController@DislikePost');

//Comment Post Route
 Route::post('addcomments','CommentController@addcomments');
 
 Route::post('forgot/password','UserController@forgotPassword')->name('forgot');
 Route::get('sendEmailDone/{email}/{verifyToken}','UserController@resetPassword');
 Route::post('reset','UserController@setpassword');


Route::get('friends/{slug}','FriendshipController@findfriends');
Route::get('friends/images','FriendshipController@myfriendsimages');
Route::get('addFriend','FriendshipController@addFriend');
Route::get('requestes','FriendshipController@requestes');
Route::get('confirm/request','FriendshipController@confirmrequest');
Route::get('remove/request','FriendshipController@removerequest');
Route::get('friendlist','FriendshipController@friendlist');
Route::get('notifications/{id}','NotificationController@getfriend');


Route::get('messages','MessageController@index');
Route::get('getmessages','MessageController@getmessages');
Route::get('getmessages/{id}','MessageController@getmesges');
Route::post('sendMessage','MessageController@sendMessage');
Route::post('sendNewMessage', 'MessageController@sendNewMessage');
Route::get('newfriends','MessageController@newMessage');
});

