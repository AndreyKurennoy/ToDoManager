@extends('index')

@section('title', 'Calendar')


@section('content')
    <div class="container">
    @foreach($test as $value)
        <div class="container">
        <p style="color: {{$value->color}}">{{$value->title}}</p>
        </div>
    </div>
    @endforeach

    <div class="container">
    <form action="" method="post">
        <input type="text" id="title" placeholder="Название">


    </form>
    </div>
@endsection

