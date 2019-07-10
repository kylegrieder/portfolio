<?php

use \Illuminate\Routing\Router;

/**
 * @var Router $router
 */
/*

/**
 * Site Entry Point
 * vue-router takes care of the rest
 */

$router->domain(config('app.url'))->group(function () {
    $router->get('/', 'ViewController@index');
});

$router->domain('movies.' . config('app.url'))->group(function () {
   $router->get('/', 'ViewController@movies');
});
