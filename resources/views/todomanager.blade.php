@extends('index')

@section('title', 'Page Title')

@section('content')
    <h1>Список тасков</h1>
    <p>Просто заготовка.</p>
    <p>This is my body content.</p>
    @foreach($tasks as $task)
        <h3>{{$task->title}}</h3>
        <p>{{$task->description}}</p>
        <p>{{$task->status == 1 ? "Завершено" : "В процессе"}}</p>
    @endforeach
@endsection