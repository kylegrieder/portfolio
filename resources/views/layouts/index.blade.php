<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>kyleg.net</title>

        <!-- Bootstrap Core Styling -->
        <link href="css/app.css" rel="stylesheet">
        <!-- Bootstrap Custom Styling -->
        <link href="css/cover.css" rel="stylesheet">
    </head>
    <body>
        @include('nav.masthead')
        <div class="flex-center position-ref full-height">
            <div class="inner-cover inner">
                <div class="image-container">
                    <img src="me.jpg" />
                    <br />
                    <br />
                </div>
                <div class="about-me cover-container">
                    <p>
                        Hey. That's me up there. It was the best picture I could find of me.
                    </p>
                    <p>
                        I'm a husband, dad, geek, gamer, developer and sometimes I workout. Not lately though.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
