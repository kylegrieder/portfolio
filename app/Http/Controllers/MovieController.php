<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMovie;
use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function create(AddMovie $request) {
        $properties = $request->all();

        $movie = new Movie();
        $movie->title = $properties['title'];
        $movie->year = $properties['year'];

        $movie->save();
    }
}
