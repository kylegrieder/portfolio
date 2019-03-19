<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitPost;
use App\Post;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()
        ->filter(request(['month', 'year']))
        ->orderBy('created_at')
        ->get();

        // $archives = Post::archives();
        return $posts;
    }

    public function create(SubmitPost $request) {
        $title = $request->input('postTitle');
        $body = $request->input('postBody');

        $post = new Post();
        $post->title = $title;
        $post->body = $body;

        $post->save();
    }
}
