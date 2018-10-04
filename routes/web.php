<?php

/**
 * Site Entry Point
 * vue-router takes care of the rest
 */

Route::get('/', function () {
    return view('layouts.index');
});

/**
 * Api functions - return objects/arrays
 */
// blog posts
Route::get('/api/posts', 'PostsController@index');
// photos
Route::get('/api/photos', 'PhotosController@index');
