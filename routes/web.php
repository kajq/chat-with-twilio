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
//Rutas para crud de canales
Route::get('/channel','ChannelController@index');
Route::get('/channel/login','ChannelController@login');
Route::post('/channel/validate_login','ChannelController@valide_user');
Route::post('/channel/create', 'ChannelController@createChannel');
Route::post('/channel/edit', 'ChannelController@editChannel');
Route::post('/channel/update', 'ChannelController@updateChannel');
Route::post('/channel/delete', 'ChannelController@deleteChannel');

//Rutas para el chat
Route::get('/','ChatController@index');
Route::post('/chat','ChatController@refrech'); //Route::resource('posts','PostController');
Route::get('/chat/login/{sid}','ChatController@login');
Route::get('/chat/{sid}','ChatController@room');
Route::post('/chat/valide_user', 'ChatController@valide_user');//Route::get('my-posts', 'PostController@myPosts');
Route::post('/chat/room','ChatController@sendmessage');


