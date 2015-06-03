<?php

Route::model('generates', 'App\Models\Registration');
Route::model('semesters', 'App\Models\Semester');
Route::model('coffers', 'App\Models\Coffer');
Route::model('courses', 'App\Models\Course');
Route::model('class-schedules', 'App\Models\ClassSchedule');
Route::model('exam-schedules', 'App\Models\ExamSchedule');
Route::model('levels', 'App\Models\Level');

Route::bind('generates', function($value, $route){
    return App\Models\Registration::whereId($value)->first();
});
Route::bind('semesters', function($value, $route){
    return App\Models\Semester::whereId($value)->first();
});
Route::bind('coffers', function($value, $route){
    return App\Models\Coffer::whereId($value)->first();
});

Route::bind('courses', function($value, $route){
    return App\Models\Course::whereId($value)->first();
});

Route::bind('class-schedules', function($value, $route){
    return App\Models\ClassSchedule::whereId($value)->first();
});

Route::bind('exam-schedules', function($value, $route){
    return App\Models\ExamSchedule::whereId($value)->first();
});

Route::bind('levels', function($value, $route){
    return App\Models\Level::whereId($value)->first();
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

Route::resource('courses', 'Admin\CourseController');
Route::resource('semesters', 'Admin\SemestersController');
Route::resource('semesters.coffers', 'Admin\CoffersController');
Route::resource('semesters.class-schedules', 'Admin\ClassScheduleController');
Route::resource('semesters.exam-schedules', 'Admin\ExamScheduleController');
Route::resource('semesters.coffers.levels', 'Admin\LevelCofferController');
Route::resource('semesters.class-schedules.levels', 'Admin\LevelClassController');
Route::resource('semesters.exam-schedules.levels', 'Admin\LevelExamController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);