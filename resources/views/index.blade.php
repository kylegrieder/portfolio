@extends('layouts.master')

@section('content')
    <transition name="slide">
        <router-view></router-view>
    </transition>
@endsection
