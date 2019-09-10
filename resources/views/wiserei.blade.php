@extends('layouts.master')

@section('styling')
    <link rel="stylesheet" type="text/css" href="/css/wiserei.css">
@endsection

@section('content')
    <wiserei
            airtable_api_key="{{$airtableApiKey}}"
            airtable_wiserei_base="{{$airtableWisereiBase}}"
    >
    </wiserei>
@endsection

@section('vue')
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/wiserei.js') }}"></script>
@endsection
