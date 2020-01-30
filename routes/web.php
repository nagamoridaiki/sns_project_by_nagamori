<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', 'HelloController@index');
Route::get('hello/other','HelloController@other');



Route::get('controller', 'HelloController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/res','ResponseController@index');

Route::get('/form','FormController@index');
Route::post('/form','FormController@post');

Route::get('/trainig','TrainigController@index');
Route::post('/trainig','TrainigController@post');

Route::get('/profiel/index/{id}','ProfielController@index');
Route::get('/profiel/edit/{id}','ProfielController@edit');
Route::post('/profiel/update/{id}','ProfielController@update');
Auth::routes();

Route::get('/chat/index/{id}', 'ChatController@index');
Route::post('/chat/send/{id}', 'ChatController@send');
Auth::routes();

