@extends('layouts.master')

@section('styling')
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
        <div class="container">
            <div class="d-flex justify-content-center">
                <form method="get" action="/wiserei" class="mt-5 justify-content-center">
                    <div>
                        <input class="form-control" name="password" id="password" type="password" placeholder="password"/></b-input>
                        <button type="submit" class="btn btn-primary mt-2 ml-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection

@section('vue')
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/wiserei.js') }}"></script>
@endsection
