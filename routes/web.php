<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    return 
    '<html>
        <body>
        <h1>
        Hello
        </h1>

        <p>
        this is sample page.
        </p>
        </body> 
    </html>';
});

Route::get('controller', 'HelloController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
