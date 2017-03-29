@extends('index')

@section('title', 'Что нового?')

@section('head')
    <script src="{{URL::asset('/js/history.js')}}"></script>
@endsection

@section('content')
    <div class="container">
        @if(auth()->check() && auth()->user()->is_admin == 1)
            <a href="#" class="pull-right" id="add-news"><i class="fa fa-plus-circle" aria-hidden="true"></i>Добавить новость</a>
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
                            <th><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> / <a href="{{URL('/history/remove/'.$item['id'])}}"><i class="fa fa-trash" aria-hidden="true"></i></a></th>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection