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
    return view('layouts.about');
});

Route::get('/blog', 'PostsController@index');
Route::get('/blog/{post}', 'PostsController@show');

Route::get('/posts', 'PostsController@retrievePosts');
Route::get('/post/{post}', 'PostsController@retrievePost');

Route::get('/photos', 'PhotosController@index');
Route::get('/photos/{photo}', 'PhotosController@show');
