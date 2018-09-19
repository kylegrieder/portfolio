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
    return view('layouts.index');
});

/**
 * Resource functions - return views
 */
// blog posts
Route::get('/blog', 'PostsController@index');
Route::get('/blog/{post}', 'PostsController@show');
// photos
Route::get('/photos', 'PhotosController@index');
Route::get('/photos/{photo}', 'PhotosController@show');

/**
 * Api functions - return objects/arrays
 */
// blog posts
Route::get('/api/posts', 'PostsController@getPosts');
Route::get('/api/post/{postId}', 'PostsController@getPost');
// photos
Route::get('/api/photos', 'PhotosController@getPhotos');
Route::get('/api/photo/{photo}', 'PhotosController@getPhoto');
