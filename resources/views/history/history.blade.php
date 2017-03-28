@extends('index')

@section('title', 'Что нового?')

@section('head')
@endsection

@section('content')
    <div class="container">
        @if(auth()->check() && auth()->user()->is_admin == 1)
            <a href="#" class="pull-right">Добавить новость</a>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Что Нового?</th>
                @if(auth()->check() && auth()->user()->is_admin == 1)<th>Опции</th>@endif
            </tr>
            </thead>
            <tbody>
                @foreach($history as $item)
                    <tr>
                        <td>{{$item->date}}</td>
                        <td>{{$item->description}}</td>
                        @if(auth()->check() && auth()->user()->is_admin == 1)
                            <th><a href="#">Редактировать</a> / <a href="#">Удалить</a></th>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection