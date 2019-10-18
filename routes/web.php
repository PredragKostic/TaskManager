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
