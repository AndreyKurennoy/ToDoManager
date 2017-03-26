@extends('index')

@section('title', 'Calendar')


@section('content')
    @foreach($test as $value)
        <div class="container">
        <p style="color: {{$value->color}}">{{$value->title}}</p>
        </div>
    @endforeach
@endsection