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

Auth::routes();

//Pages without Login Restrictions
Route::get('/home', 'BlogsController@home')->name('home');
Route::get('/test', 'HomeController@test')->name('test');
Route::get('/blogs','HomeController@index')->name('blogs.index');


Route::get('/blogs/create', 'BlogsController@create')->name('blogs.create');
Route::get('/blogs/{blog}/edit', 'BlogsController@edit')->name('blogs.edit');
Route::put('/blogs/{blog}', 'BlogsController@update')->name('blogs.update');
Route::post('/blogs', 'BlogsController@store')->name('blogs.store');
Route::delete('/blogs/{blog}', 'BlogsController@destroy')->name('blogs.destroy');
Route::get('/blogs/{blog}', 'BlogsController@show')->name('blogs.show');