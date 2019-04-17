<?php

/**
 * Site Entry Point
 * vue-router takes care of the rest
 */

Route::domain(config('app.url'))->group(function () {
    Route::get('/', 'ViewController@index');
});

Route::domain('movies.' . config('app.url'))->group(function () {
   Route::get('/', 'ViewController@movies');
});
