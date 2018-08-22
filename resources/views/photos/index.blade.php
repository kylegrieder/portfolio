@extends('layouts.index')

@section('content')
<div>
    <div class="jumbotron text-center">
    	<div class="container">
    		{{-- <h1 class="jumbotron-heading">Album example</h1> --}}
    		<p class="lead text-white raleway-light">Pics of me & my family, and some tech stuff.</p>
    	</div>
    </div>
    <div class="album text-muted">
    	<photos></photos>
    </div>
</div>
@endsection