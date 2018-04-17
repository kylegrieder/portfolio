@extends('layouts.index')

@section('content')

    <div class="flex-center position-ref full-height">
        <div class="inner-cover inner">
            <div class="cover-container blog-post">

                <div class="blog-post-title">
                    <h1>
                        {!! $post->title !!}
                    </h1>
                </div>

                <br />

                <div class="blog-post-body">
                    
                    {!! $post->body !!}
                    
                </div>

            </div>
        </div>
    </div>

@endsection
