<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['uses' => 'LoginController@getLogin', 'as' => '/']);
Route::get('/login', ['uses' => 'LoginController@getLogin', 'as' => '/login']);
Route::post('/login', ['uses' => 'LoginController@postLogin', 'as' => '/login']);

Route::group(['middleware' => ['Authen']], function(){
    Route::get('logout', ['uses' => 'LoginController@getLogout', 'as' => 'logout']);
    Route::get('dashboard', ['uses' => 'DashboardController@dashboard', 'as' => 'dashboard']);
});

//Admin routes
Route::group(['middleware' => ['Authen', 'roles'], 'roles' =>['admin']], function(){
    Route::get('/manage/course', ['uses' => 'CourseController@getManageCourse', 'as' => '/manage/course']);
    Route::post('/manage/course/addYear', ['as' => 'postAcademicYear', 'uses'=> 'CourseController@postAcademicYear']);
    Route::post('/manage/course/addProgram', ['as' => 'postProgram', 'uses'=> 'CourseController@postProgram']);
});
