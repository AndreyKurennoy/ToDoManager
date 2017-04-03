@extends('index')
@section('head')
    <script src="{{URL::asset('/js/category.js')}}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js"></script>
@endsection

@section('title', 'Calendar')


@section('content')
    <div class="container">
    @foreach($categories as $value)
        <div class="container">
        <p style="color: {{$value->color}}">{{$value->title}}</p>
        </div>
    </div>
    @endforeach

    <div class="container">
    <form  class="add-category-form form-horizontal" id="add-category-form" onsubmit='return false;'>

        <input type="text" id="title" name="title" placeholder="Название">
        <div id="cp2" class="input-group colorpicker-component form-control">
            <input type="text" value="#00AABB" name="color" class="form-group" />
            <span class="input-group-addon"><i></i></span>
        </div>

        <button type="submit" id="category" class="btn btn-default category-save ">Новая категория</button>

    </form>
    </div>


@endsection

