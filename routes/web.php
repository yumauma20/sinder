<?php

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    Route::get('show/{id}', 'UserController@show')->name('users.show');
});

Auth::routes();

Route::get('/', function () {
    return view('top');
});

Route::get('/home', 'HomeController@index')->name('home');
