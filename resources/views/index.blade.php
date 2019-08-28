@extends('layouts.master')

@section('styling')
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/cover.css">
    <link rel="stylesheet" type="text/css" href="/css/post.css">
    <link rel="stylesheet" type="text/css" href="/css/album.css">
@endsection

@section('content')
    <router-view></router-view>
@endsection

@section('vue')
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection

