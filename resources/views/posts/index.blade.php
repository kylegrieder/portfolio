@extends('layouts.index')

@section('content')

    <div class="flex-center position-ref full-height" id="posts">
        <div class="inner-cover inner">
            <div class="about-me cover-container">
                @foreach ($posts as $post)
                    <h1>
                        <a href="/post/{{ $post->id }}">
                            {{ $post->title }}
                        </a>
                    </h1>
                    <div class="timestamp">
                        {{ $post->created_at->diffForHumans() }}
                    </div>
                    <br>
                    <div class="cover-post-body">
                            <a href="/post/{{ $post->id }}">
                                {!! $post->body !!}
                            </a>
                    </div>
                    <br>
                    <br>
                @endforeach
            </div>
        </div>
    </div>

@endsection

