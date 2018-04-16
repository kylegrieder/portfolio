@extends('layouts.index')

@section('content')

    <div class="flex-center position-ref full-height">
        <div class="inner-cover inner">
            <div class="about-me cover-container">
                @foreach ($posts as $post)

                    <h1>
                        <a href="/post/{{ $post->id }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <div class="cover-post-body">
                        <p>
                            <a href="/post/{{ $post->id }}">
                                {{ $post->body}}
                            </a>
                        </p>
                    </div>
                    <br>
                    <br>
                @endforeach
            </div>
        </div>
    </div>

@endsection
