@extends('layouts.app')
@section('header')
@endsection

@section('content')

    <form method="post" action="{{route('register_confirm')}}" style="display: flex; flex-direction: column; align-items: center;">
        @csrf

        <input class = "input-group-text m-3" type="email" name="email" id="email" placeholder="Введите почту">
        <input class = "input-group-text m-3" type="password" name="password" id="password" placeholder="Введите пароль">
        <button class="btn btn-success" type="submit">Зарегестрироваться</button>
    </form>


@endsection
