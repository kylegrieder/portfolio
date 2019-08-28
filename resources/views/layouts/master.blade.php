<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>kyleg.net</title>

        @yield('styling')

    </head>

    <body>
        <div id="app">
            @if (!Request::is('wiserei'))
            <div class="container">
                <div class="flex-center sticky-top position-ref full-height masthead-bg">
                    <div class="inner-cover inner">
                        <div class="row-center">
                            <a href="https://twitter.com/kylemcgriffin" target="_blank"><img class="svg" src="/images/twitter.svg" alt="twitter"></img></a>
                            <a href="https://instagram.com/kgfromthemv" target="_blank"><img class="svg" src="/images/instagram.svg" alt="instagram"></img></a>
                            <a href="https://github.com/kylegrieder" target="_blank"><img class="svg" src="/images/github.svg" alt="gitHub"></img></a>
                        </div>
                        <div class="cover-title">
                            @yield('title-link')
                        </div>
                        <div class="raleway-light">
                            <div>
                                @yield('links')
                            </div>
                        </div>
                    </div>
                </div>
            @endif
                @yield('content')
            @if (!Request::is('wiserei'))
            </div>
            @endif
        </div>
        @yield('vue')
    </body>

</html>
