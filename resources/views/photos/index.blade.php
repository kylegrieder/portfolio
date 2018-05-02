@extends('layouts.index');

@section('content')

<section class="jumbotron text-center">
	<div class="container">
		{{-- <h1 class="jumbotron-heading">Album example</h1> --}}
		<p class="lead text-white raleway-light">Here's some pictures of me and my family, and probably some tech or video game stuff. Basically its a group of things I care about.</p>
	</div>
</section>

<div class="album text-muted">
	<div class="container" id='photos'>
		<div class="row">

			@foreach ($photos as $photo)

			<div class="card">
				<div class="{{ $photo['orientation']}}">
					<auto-rotate><img src="{{ $photo['url'] }}" alt="Card image cap"/></auto-rotate>
				</div>

				@if ($photo->description)
					<p class="card-text">{{ $photo->description }}</p>
				@endif

			</div>

			@endforeach

		</div>
	</div>
</div>
@endsection