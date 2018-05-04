<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\Markdown\Facades\Markdown;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function show(Post $post)
    {   
        return view('posts.show');
    }

    public function retrievePosts()
    {
        $posts = Post::latest()
        ->filter(request(['month', 'year']))
        ->orderBy('created_at')
        ->get();

        $archives = Post::archives();

        return $posts;
    }

    public function retrievePost($postId)
    {
        $post = Post::where('id', $postId)
        ->get();

        return $post;
    }
}
