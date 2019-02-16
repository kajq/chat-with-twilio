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

Route::get('/channel','ChannelController@index');
Route::post('/channel/create', 'ChannelController@createChannel');
Route::post('/channel/edit', 'ChannelController@editChannel');
Route::post('/channel/update', 'ChannelController@updateChannel');
Route::post('/channel/delete', 'ChannelController@deleteChannel');
//Route::resource('/', 'ChannelController');
