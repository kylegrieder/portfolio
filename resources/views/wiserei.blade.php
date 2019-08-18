@extends('layouts.master')

@section('styling')
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/wiserei.css">
@endsection

@section('wiserei')
    @if ($authenticated)
        <wiserei
            airtable_api_key="{{$airtableApiKey}}"
            airtable_wiserei_base="{{$airtableWisereiBase}}"
        >
        </wiserei>
    @else
        <form>
            <input name="password" type="password" method="get" placeholder="password"/>
            <button type="submit">Submit</button>
        </form>
    @endif
@endsection

@section('vue')
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/wiserei.js') }}"></script>
@endsection
