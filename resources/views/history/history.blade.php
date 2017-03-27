@extends('index')

@section('title', 'Что нового?')

@section('head')
@endsection

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Дата</th>
                <th>Что Нового?</th>
            </tr>
            </thead>
            <tbody>
                @foreach($history as $item)
                    <tr>
                        <td>{{$item->date}}</td>
                        <td>{{$item->description}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection