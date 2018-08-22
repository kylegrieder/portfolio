<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('layouts.head')
    <body>
    	<div id="app">
	        @include('nav.masthead')
	        @yield('content')
        </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
