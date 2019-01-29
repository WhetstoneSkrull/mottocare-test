<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
        <title>Mottocare | Your car is in safe hands</title>
        <link href=" {{ ('css/app.css') }}" rel="stylesheet">
    <!--    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet"> -->

        <!--Admin login css-->
        <link href=" {{ ('css/style.min.css') }}" rel="stylesheet">
        <link href=" {{ ('css/style.min.css.map') }}" rel="stylesheet">
        <!--Admin Dashboard css-->
        <link href=" {{ ('css/style-one.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css">


        <link href=" {{ ('css/font-awesome.css') }}" rel="stylesheet">
        <link href=" {{ ('css/simple-line-icons.css') }}" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{('css/select2.css')}}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
          </head>
    <body>

    <style type="text/css">
    a{
  color:none;
  font-style: none;
  text-decoration:none;
  }
  a:hover{
  color:none;
  text-decoration:none;
  }
  a:active{
  color:none;
  }
  a:visited{
  color: none;
  text-decoration:none;
  }
      </style>
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
