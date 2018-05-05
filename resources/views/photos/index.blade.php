@extends('layouts.index');

@section('content')

<section class="jumbotron text-center">
	<div class="container">
		<h1 class="jumbotron-heading">Album example</h1>
		<p class="lead text-white raleway-light">Here's some pictures of me and my family, and probably some tech or video game stuff. Basically its a group of things I care about.</p>
	</div>
</section>

<div class="album text-muted">
	<photos></photos>
</div>
@endsection