<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>

    <body>

        <div id="app" class="app">


            <auth user-id="{{ auth()->check() ? auth()->user()->id : '' }}"></auth>

            <page-menu></page-menu>

            <div class="container">

                @yield ('content')

            </div>

        </div>

        <script>
            FontAwesomeConfig = { searchPseudoElements: true };
        </script>
        <script src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>

    </body>

</html>
