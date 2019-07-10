<?php

use Illuminate\Http\Request;
use \Illuminate\Routing\Router;

/**
 * @var Router $router
 */
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$router->middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// blog posts
$router->get('/posts', 'PostsController@index');
$router->post('/newPost', 'PostsController@create');
// photos
$router->get('/photos', 'PhotosController@index');

// movies
$router->post('/addMovie', 'MovieController@create');

$router->get('/movies', function () {
    $builder = \App\Movie::with('genres')->get();

    return response()->json($builder->paginate());
});
