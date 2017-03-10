@extends('index')

@section('title', 'Page Title')

@section('content')
    <h1>Hello Laravel!</h1>
    <p>This is my body content.</p>
    <p>{{$tasks}}</p>
@endsection