<?php

use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);

Route::get('home', ['uses' => 'HomeController@index', 'as' => 'home']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('courses/{id}/details','CoursesController@showPartial');
Route::get('courses/create-ex','CoursesController@createPartial');
Route::get('courses/{id}/edit-ex','CoursesController@editPartial');
Route::post('courses/{id}/subjects', ['uses' => 'CoursesController@subjects', 'as' => 'course.subject']);

Route::resource('courses', 'CoursesController');

// additional routes of resource controllers must be added before it.
Route::post('subjects/all-subjects', 'SubjectsController@allSubjects');
Route::post('subjects/subject-details/{subjects}', 'SubjectsController@subjectDetails');
// Route::resource('subjects', 'SubjectsController', ['except' => ['index']]);
Route::resource('subjects', 'SubjectsController');

Route::resource('blogs', 'BlogController');

Route::post('generate-slug', function(){
	return Str::slug(Input::get('target'));
	
});

Route::get('admin/dashboard', 'DashboardController@index');
Route::get('admin/dashboard/users', 'DashboardController@users');
Route::get('admin/dashboard/stats', 'DashboardController@stats');
Route::get('admin/runonce', 'DashboardController@runonce');