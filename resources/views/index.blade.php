<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap -->
    <link href="{{URL::asset('fornax/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::asset('fornax/css/bootstrap-responsive.css')}}" rel="stylesheet">
    <link href="{{URL::asset('fornax/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/css/styles.css')}}">
    <link href="{{URL::asset('fornax/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!--Font-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- SCRIPT
    ============================================================-->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="{{URL::asset('fornax/js/bootstrap.min.js')}}"></script>

    <script src="{{URL::asset('/js/app.js')}}"></script>
    <script src="{{URL::asset('/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script>    var BASE_URL = "{{ url('/') }}" </script>
    <script src="{{URL::asset('/js/main.js')}}"></script>


    @yield('head')


</head>
<body>

@include('layouts.header')

@yield('content')

@include('layouts.footer')

</body>
</html>