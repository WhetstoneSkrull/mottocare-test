<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Mottocare</title>
        <link href=" {{ ('css/app.css') }}" rel="stylesheet">
        <!--Admin login css-->
        <link href=" {{ ('css/style.min.css') }}" rel="stylesheet">
        <link href=" {{ ('css/style.min.css.map') }}" rel="stylesheet">
        <!--Admin Dashboard css-->
        <link href=" {{ ('css/style-one.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css">


        <link href=" {{ ('css/font-awesome.css') }}" rel="stylesheet">
        <link href=" {{ ('css/simple-line-icons.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        <script src="{{ ('js/bootstrap.js') }}"></script>
        <script src="{{ ('js/app.js') }}"></script>
        <script src="{{ ('js/jquery.min.js') }}"></script>
        <script src="{{ ('js/dashboard.js') }}"></script>
        <script src="{{ ('js/maps.js') }}"></script>
        <script src="{{ ('js/misc.js') }}"></script>
        <script src="{{ ('js/off-canvas.js') }}"></script>
    </body>
    </html>
