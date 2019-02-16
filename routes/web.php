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

Route::get('/','ChannelController@index');
Route::post('/create', 'ChannelController@createChannel');
Route::post('/edit', 'ChannelController@editChannel');
Route::post('/update', 'ChannelController@updateChannel');
Route::post('/delete', 'ChannelController@deleteChannel');
//Route::resource('/', 'ChannelController');
