<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>kyleg.net</title>

        <link rel="stylesheet" type="text/css" href="/css/app.css">
        @yield('styling')

    </head>

    <body>
        <div id="app">
            @yield('wiserei')
            <div class="container">
                @yield('masthead')
                @yield('content')
            </div>
        </div>
        @yield('vue')
    </body>

</html>
