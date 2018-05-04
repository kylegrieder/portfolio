@extends('layouts.index')
@section('content')

<div class="flex-center position-ref full-height">
    <div class="inner-cover inner">
        <div class="cover-container blog-post">
            <post :postId="{{ $postId }}">
            </post>
            {{ $postId }}
        </div>
    </div>
</div>

@endsection
