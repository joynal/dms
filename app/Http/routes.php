<?php

Route::model('generates', 'App\Models\Registration');
Route::model('semesters', 'App\Models\Semester');
Route::model('coffers', 'App\Models\Coffer');
Route::model('courses', 'App\Models\Course');
Route::model('class-schedules', 'App\Models\ClassSchedule');
Route::model('exam-schedules', 'App\Models\ExamSchedule');
Route::model('levels', 'App\Models\Level');
Route::model('faculties', 'App\Models\Faculty');
Route::model('register', 'App\Models\Registration');

Route::bind('generates', function ($value, $route)
{
    return App\Models\Registration::whereId($value)->first();
});
Route::bind('semesters', function ($value, $route)
{
    return App\Models\Semester::whereId($value)->first();
});
Route::bind('coffers', function ($value, $route)
{
    return App\Models\Coffer::whereId($value)->first();
});

Route::bind('courses', function ($value, $route)
{
    return App\Models\Course::whereId($value)->first();
});

Route::bind('class-schedules', function ($value, $route)
{
    return App\Models\ClassSchedule::whereId($value)->first();
});

Route::bind('exam-schedules', function ($value, $route)
{
    return App\Models\ExamSchedule::whereId($value)->first();
});

Route::bind('levels', function ($value, $route)
{
    return App\Models\Level::whereId($value)->first();
});

Route::bind('faculties', function ($value, $route)
{
    return App\Models\Faculty::whereId($value)->first();
});

Route::bind('register', function ($value, $route)
{
    return App\Models\Registration::whereId($value)->first();
});

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);
Route::get('home', 'HomeController@index');

Route::get('admin', [
    'as'         => 'admin',
    'uses'       => 'Admin\AdminController@index',
    'middleware' => 'admin'
]);

Route::get('student', [
    'as'         => 'student',
    'uses'       => 'Student\StudentController@index',
    'middleware' => 'student'
]);

Route::get('faculty', [
    'as'         => 'faculty',
    'uses'       => 'Faculty\FacultyController@index',
    'middleware' => 'faculty'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function ()
{

    Route::resource('generates', 'Admin\GeneratesController');
    Route::resource('courses', 'Admin\CourseController');
    Route::resource('semesters', 'Admin\SemestersController');
    Route::resource('semesters.coffers', 'Admin\CoffersController');
    Route::resource('semesters.class-schedules', 'Admin\ClassScheduleController');
    Route::resource('semesters.exam-schedules', 'Admin\ExamScheduleController');
    Route::resource('semesters.coffers.levels', 'Admin\LevelCofferController');
    Route::resource('semesters.class-schedules.levels', 'Admin\LevelClassController');
    Route::resource('semesters.exam-schedules.levels', 'Admin\LevelExamController');
    Route::resource('semesters.exam-schedules.faculties', 'Admin\FaqsExamController');

});

Route::group(['prefix' => 'student', 'middleware' => 'student'], function ()
{
    Route::get('overview', ['as' => 'overview', 'uses' => 'Student\StudentController@overview']);
    Route::get('my-courses', ['as' => 'my-courses', 'uses' => 'Student\StudentController@myCourses']);
    Route::get('my-class-schedules', [
        'as' => 'my-class-schedules', 'uses' => 'Student\StudentController@myClassSchedules']);
    Route::get('my-exam-schedules', [
        'as' => 'my-exam-schedules', 'uses' => 'Student\StudentController@myExamSchedules']);
    Route::get('my-results', ['as' => 'my-results', 'uses' => 'Student\StudentController@myResults']);
});


Route::get('auth/register/{confirmation}', 'Auth\AuthController@getRegister');
Route::post('auth/register/{confirmation}', 'Auth\AuthController@postRegister');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::controllers([
    'password' => 'Auth\PasswordController',
]);