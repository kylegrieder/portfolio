<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('layouts.head')
    <body>
        @include('nav.masthead')
        @yield('content')
    </body>
</html>
