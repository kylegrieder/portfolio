@extends('layouts.master')

@section('content')
    <movie-search
        movies="{{ $movies }}"
        genres="{{ $genres }}"
        imageUrl="{{ $tmdbImageUrl }}"
    >
    </movie-search>
@endsection

@section('vue')
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
