<?php


Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);
Route::get('home','HomeController@index');

Route::get('admin', [
    'as' => 'admin',
    'uses' => 'AdminController@index',
    'middleware' => 'admin'
]);

Route::get('student', [
    'as' => 'student',
    'uses' => 'StudentController@index',
    'middleware' => 'student'
]);

Route::get('faculty', [
    'as' => 'faculty',
    'uses' => 'FacultyController@index',
    'middleware' => 'faculty'
]);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);