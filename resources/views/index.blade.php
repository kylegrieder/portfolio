@extends('layouts.master')

@section('content')
    <router-view></router-view>
@endsection

@section('vue')
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection

@section('links')
    <router-link to="/blog">Blog</router-link>
@endsection

@section('title-link')
    <router-link id="title" to="/">kyle grieder</router-link>
@endsection
