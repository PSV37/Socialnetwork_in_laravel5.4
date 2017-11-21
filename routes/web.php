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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('saveImg', 'DashboardController@saveImg');
Route::get('profile', 'DashboardController@profile');
Route::post('updateuser', 'UserController@updateuser');


Route::get('posts','PostController@index');
Route::get('posts/display','PostController@posts');
Route::post('addpost', 'PostController@addpost');
 Route::get('deletepost/{id}','PostController@deletepost');
Route::post('postImg', 'PostController@saveImg');

Route::get('LikePost/{id}', 'PostController@LikePost');

//Comment Post Route
 Route::post('addcomments','CommentController@addcomments');