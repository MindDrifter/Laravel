@extends('layouts.app')
@section('header')
@endsection

@section('content')

    <form method="post" action="{{route('add_card_confirm')}}" style="display: flex; flex-direction: column; align-items: center;">
        @csrf

        <input type="text" name="theme" id="theme" placeholder="Введите тему карты">
        <input type="text" name="title" id="title" placeholder="Введите название карты">
        <input type="text" name="body" id="body" placeholder="Введите название карты">
        <button type="submit">Добавить карту</button>
    </form>


@endsection
