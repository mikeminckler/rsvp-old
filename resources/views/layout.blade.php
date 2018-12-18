<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Brentwood Info Session RSVP</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i|Playfair+Display" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('ga')

    </head>

    <body>

        <div id="app" class="app">

            <div class="background-container" :class="$store.state.introComplete ? 'visible' : ''">
                <div class="background">
                    <div class="background-image">
                        <img class="background-icon" src="/images/svg/icon-white.svg">
                    </div>
                </div>
            </div>

            <auth user-id="{{ auth()->check() ? auth()->user()->id : '' }}"></auth>

            <page-menu></page-menu>

            <router-view></router-view>

        </div>

        <script>
            FontAwesomeConfig = { searchPseudoElements: true };
        </script>
        <script src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>

    </body>

</html>
