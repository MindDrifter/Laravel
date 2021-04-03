@extends('layouts.app')

@section('title-block') Auth @endsection

@section('content')
    <h1>All messages</h1>
    <ul>
        <?php
        $d = file_get_contents("https://jsonplaceholder.typicode.com/posts");
        $d = json_decode($d, true);
        print_r($d[0]["title"])
            ?>


        @foreach($data as $el)
        <li style="width: 500px" class="card-group container">
            <div  class="card m-3 ">

                <span class="card-title">{{$el->name}} </span>
                <span class="card-text p-3">{{$el->mail}} </span>
                <span class="card-body p-3">{{$el->area}} </span>
                <div class="card-footer">
                    <a class="btn" href="{{route('one_message', $el->id)}}">Редактировать</a> <a class="btn btn-danger" href="{{route('delete_message_yes', $el->id)}}">Удалить</a>
                </div>
            </div>
        </li>
        @endforeach

        @if(!count($data)>0)
            <h1>Сообщений нет</h1>
        @endif
    </ul>
@endsection

