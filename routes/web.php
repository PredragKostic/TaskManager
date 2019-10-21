<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => true]);


Route::group(['middleware' => ['auth']], function () {
    
    Route::get('admin/home', 'HomeController@index')->name('home');

    Route::resource('admin/users', 'UsersController')->middleware('admin');

    Route::resource('admin/projects', 'ProjectsController');

    Route::resource('admin/tasks', 'TasksController');

    Route::resource('admin/comments', 'CommentsController');

});

Route::get('admin/practices/1', 'PracticesController@task1');
Route::get('admin/practices/2', 'PracticesController@task2');
Route::get('admin/practices/3', 'PracticesController@task3');
Route::get('admin/practices/4', 'PracticesController@task4');
Route::get('admin/practices/5', 'PracticesController@task5');
Route::get('admin/practices/6', 'PracticesController@task6');
Route::get('admin/practices/7', 'PracticesController@task7');
Route::get('admin/practices/8', 'PracticesController@task8');
Route::get('admin/practices/9', 'PracticesController@task9');
Route::get('admin/practices/10', 'PracticesController@task10');
Route::get('admin/practices/11', 'PracticesController@task11');
Route::get('admin/practices/12', 'PracticesController@task12');
Route::get('admin/practices/13', 'PracticesController@task13');
Route::get('admin/practices/14', 'PracticesController@task14');



