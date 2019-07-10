<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// blog posts
Route::get('/posts', 'PostsController@index');
Route::post('/newPost', 'PostsController@create');
// photos
Route::get('/photos', 'PhotosController@index');

// movies
Route::post('/addMovie', 'MovieController@create');

$router->get('/shite', function () {
    $builder = \App\Movie::with('genres');

    return response()->json($builder->paginate());
});
