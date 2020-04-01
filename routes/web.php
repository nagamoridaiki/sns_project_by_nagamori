<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/vue', function () {
    return view('vuetest');
});
Route::get('/vueuser', function () {
    return App\User::all();
});

//APIテスト用
Route::get('/apitest','PostController@index');
Route::get('/create', function () {
    return view('apiform');
});
Route::post('/send', 'PostController@send');
Route::get('/twitter', 'TwitterController@index');

//HomeController@indexをスキップした
Route::get('/home', 'UsersController@index');

Route::get('/users/index/{id}','UsersController@index');
Route::post('/users/show/{id}','UsersController@show');
Route::get('/users/edit/{id}','UsersController@edit');
Route::post('/users/update/{id}','UsersController@update');
Route::get('/users/create/{id}','UsersController@create');
Route::get('/users/destroy/{id}','UsersController@destroy');
Route::get('/users/photocreate/{id}', 'PhotosController@create');
Route::post('/users/photocreate', 'PhotosController@store');
Route::get('/users/detail/{id}' , 'UsersController@visit');
Route::get('/users/myprof/{id}','UsersController@myprof');
Auth::routes();


Route::get('/messages/index/{id}', 'MessagesController@index');
Route::post('/messages/send/{id}', 'MessagesController@send');
Auth::routes();

Route::get('/article/index/{id}' , 'ArticleController@index');
Route::get('/article/show/{id}' , 'ArticleController@show');
Route::post('/article/create/{id}' , 'ArticleController@create');
Route::post('/article/destroy/{id}' , 'ArticleController@destroy');
Route::post('/comments/create/{id}' , 'CommentsController@create');
Route::get('/comments/destroy/{id}' , 'CommentsController@destroy');
Auth::routes();






