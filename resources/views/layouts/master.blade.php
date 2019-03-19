<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>kyleg.net</title>

        <!-- Bootstrap Core Styling -->
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <!-- Bootstrap Custom Styling -->
        <link rel="stylesheet" type="text/css" href="/css/cover.css">
        <link rel="stylesheet" type="text/css" href="/css/post.css">
        <link rel="stylesheet" type="text/css" href="/css/album.css">
    </head>

    <body>
        <div id="app">
            <div class="container">
                @include('nav.masthead')
                @yield('content')
            </div>
        </div>
        @yield('vue')
    </body>

</html>
