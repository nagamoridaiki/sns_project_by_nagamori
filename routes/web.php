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

Route::get('/home/profiel/{id}','ProfielController@show');
Route::post('/home/profiel/{id}','ProfielController@edit');
Auth::routes();

Route::get('/home/editprof/{id}','EditprofController@index');

