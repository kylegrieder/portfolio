<?php

use \Illuminate\Routing\Router;

/**
 * @var Router $router
 */

$router->domain(config('app.url'))->group(function () use ($router){
    $router->get('/', 'ViewController@index');
});

$router->domain('movies.' . config('app.url'))->group(function () use ($router) {
   $router->get('/', 'ViewController@movies');
});
