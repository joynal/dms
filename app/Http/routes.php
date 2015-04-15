<?php


Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);
Route::get('home','HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

