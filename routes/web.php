<?php

use App\Events\WebsocketDemoEvent;

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
    broadcast(new WebsocketDemoEvent('some data'));

    return view('welcome');
});

Route::get('/chats', 'ChatsController@index');

Route::get('/messages', 'ChatsController@fetchMessages');
Route::post('/messages', 'ChatsController@sendMessage');

Route::get('/project','ProjectController@index');
Route::get('/project/add_project','ProjectController@create');
Route::post('/project/add_project','ProjectController@store');
Route::delete('/project/delete/{id}','ProjectController@destroy');


Route::get('/project/view/{id}','ViewController@index');


Route::get('/project/add_client','ClientController@create');
Route::post('/project/add_client','ClientController@store');
Route::get('/project/edit_client','ClientController@edit');
Route::post('/project/edit_client','ClientController@update');
Route::delete('/project/delete_client/{id}','ClientController@destroy');

Route::get('/project/task/{id}','TaskController@index');
Route::get('/project/add_task','TaskController@create');
Route::post('/project/add_task','TaskController@store');
Route::get('/project/task/view/{id}','TaskController@view');
Route::get('/project/edit_task','TaskController@edit');
Route::post('/project/edit_task','TaskController@update');
Route::delete('/project/delete_task/{id}','TaskController@destroy');

Route::get('/project/add_discussion','DiscussionController@create');
Route::post('/project/add_discussion','DiscussionController@store');
Route::delete('/project/delete_discussion/{id}','DiscussionController@destroy');

Route::get('/project/file/{id}','FileController@index');
Route::get('/project/add_file','FileController@create');
Route::post('/project/add_file','FileController@store');
Route::delete('/project/delete_file/{id}','FileController@destroy');

Route::get('/project/add_leader','LeaderController@create');

Route::get('/project/leader','LeaderController@index');
Route::post('/project/leader','LeaderController@store');

Route::get('/project/client','ClientController@index');
Route::post('/project/client','ClientController@store');

Route::get('/project/team','TeamController@index');
Route::post('/project/team','TeamController@store');

Route::get('/project/manage/{id}','ManageController@index');
Route::delete('/project/manage/client/{id}','ClientController@destroy');
Route::delete('/project/manage/team/{id}','TeamController@destroy');
Route::delete('/project/manage/leader/{id}','LeaderController@destroy');

Route::get('/pegawai/add_leader','LeaderController@cari');

Route::get('/public/file/{file}', function ($file='') {
    return response()->download(public_path(). "/file/".$file); 
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
