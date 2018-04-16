@extends('layouts.index')

@section('content')

    <div class="flex-center position-ref full-height">
        <div class="inner-cover inner">
            <div class="about-me cover-container">
                @foreach ($posts as $post)
                    <h1>{{ $post->title }}</h1>

                    <div class="cover-post-body block-with-text">
                        <p>{{ $post->body}}</p>
                    </div>
                    <br>
                    <br>
                @endforeach
            </div>
        </div>
    </div>

@endsection
