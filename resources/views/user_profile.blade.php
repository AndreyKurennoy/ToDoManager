@extends('index')

@section('title', 'Profile')

@section('content')
    <p>Просто заготовка.</p>
    <p>This is my body content.</p>
    @foreach($userProfile as $task)
        <h3>{{$task->name}}</h3>
        <h3>{{$task->last_name}}</h3>
        <h3>{{$task->gender}}</h3>
    @endforeach
@endsection
