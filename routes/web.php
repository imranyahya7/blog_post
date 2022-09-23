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

Route::get('/home', 'PostController@index')->name('home');

Route::post('/create-post', 'PostController@store')->name('create_post');
Route::get('/show-post/{post}', 'PostController@show')->name('show_post');

Route::get('/edit-post/{post}', 'PostController@edit')->name('edit_post');
Route::post('/update-post/{post}', 'PostController@update')->name('update_post');

Route::any('/delete-post/{post}', 'PostController@destroy')->name('delete_post');
