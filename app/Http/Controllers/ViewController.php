<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Movie;
use Illuminate\Http\Request;
use JavaScript;

class ViewController extends Controller
{
    public function index()
    {
        $appUrl = config('app.url');

        return view('index', compact('appUrl'));
    }

    public function movies()
    {
        $movies = json_decode(Movie::with('genres')->get());
        $genres = json_decode(Genre::all());
        $tmdbImageUrl = config('urls.api.tmdb.image');

//        return view('movies', compact('movies', 'genres', 'tmdbImageUrl'));
        return view('movies', [
            'movies' => [],
            'genres' => [],
            'imdbImageUrl' => ''
        ]);
    }
}
