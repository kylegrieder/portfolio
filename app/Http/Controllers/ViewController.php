<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Movie;
use JavaScript;

class ViewController extends Controller
{
    public function index() {
        $url = config('app.url');

        JavaScript::put([
            'app' => [
                'url' => $url
            ]
        ]);


        return view('index');
    }

    public function movies() {
        $movies = Movie::all();
        $genres = Genre::all();

        JavaScript::put([
            'movies' => $movies,
            'genres' => $genres,
            'urls' => [
                'tmdb' => [
                    'api' => [
                        'image' => config('urls.api.tmdb.image')
                    ]
                ]
            ]
        ]);

        return view('movies');
    }
}
