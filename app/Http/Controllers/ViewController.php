<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
