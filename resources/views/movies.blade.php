@extends('layouts.master')

@section('content')
    <movie-search
        movies="{{ $movies }}"
        genres="{{ $genres }}"
        imageUrl="{{ $tmdbImageUrl }}"
    >
    </movie-search>
@endsection
