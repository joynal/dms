<?php

Route::model('generates', 'App\Models\Registration');

Route::bind('generates', function($value, $route){
    return App\Models\Registration::whereId($value)->first();
});

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);
Route::get('home','HomeController@index');

Route::get('admin', [
    'as' => 'admin',
    'uses' => 'Admin\AdminController@index',
    'middleware' => 'admin'
]);

Route::get('student', [
    'as' => 'student',
    'uses' => 'Student\StudentController@index',
    'middleware' => 'student'
]);

Route::get('faculty', [
    'as' => 'faculty',
    'uses' => 'Faculty\FacultyController@index',
    'middleware' => 'faculty'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){

    Route::resource('generates', 'Admin\GeneratesController');

});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);