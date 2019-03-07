<?php

/**
 * Site Entry Point
 * vue-router takes care of the rest
 */

Route::get('/', function () {
    return view('index');
});

Route::get('/new-post', function () {
    return view('newPost');
});
