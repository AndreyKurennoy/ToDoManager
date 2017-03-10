<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('/css/app.css')}}">

        <script src="{{URL::asset('/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{URL::asset('/js/app.js')}}"></script>
        <script src="{{URL::asset('/js/colorbox/jquery.colorbox.js')}}"></script>
        <script src="{{URL::asset('/js/main.js')}}"></script>

        @yield('head')

    </head>
    <body>

    <div class="container">
        @yield('content')
    </div>

    </body>
</html>
