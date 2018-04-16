<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()
        ->filter(request(['month', 'year']))
        ->orderBy('created_at')
        ->get();

        $archives = Post::archives();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->title = Markdown::convertToHtml($post->title);
        $post->body = Markdown::convertToHtml($post->body);

        return view('posts.show', compact('post'));
    }
}
