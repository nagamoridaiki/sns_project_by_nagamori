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

Route::get('/users/index/{id}','UsersController@index');
Route::post('/users/show/{id}','UsersController@show');
Route::get('/users/edit/{id}','UsersController@edit');
Route::post('/users/update/{id}','UsersController@update');
Route::get('/users/create/{id}','UsersController@create');
Route::get('/users/destroy/{id}','UsersController@destroy');
Route::get('/users/edit/image_input/{id}','ImageUploadRequest@getImageInput');
Route::get('/users/photocreate/{id}', 'PhotosController@create');
Route::post('/users/photocreate', 'PhotosController@store');
Route::get('/users/detail/{id}' , 'UsersController@visit');
Route::get('/users/myprof/{id}','UsersController@myprof');
Auth::routes();


Route::get('/messages/index/{id}', 'MessagesController@index');
Route::post('/messages/send/{id}', 'MessagesController@send');
Auth::routes();

Route::get('/article/index/{id}' , 'ArticleController@index');
Route::post('/article/create/{id}' , 'ArticleController@create');
Auth::routes();






