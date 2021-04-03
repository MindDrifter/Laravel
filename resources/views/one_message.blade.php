@extends('layouts.app')

@section('header')
@endsection
<a href="contact_messages">Вернуться к списку постов</a>

<form method="post" action="{{route('one_message_submit' , $data->id)}}" style="display: flex; flex-direction: column; align-items: center;">
    @csrf
<input type="text" name="name" id="name" value="{{$data->name}}" >
<input type="email" name="mail" id="mail" value="{{$data->mail}}" >
<textarea name="area" id="area" >{{$data->area}}</textarea>
<button type="submit" >Обновить</button>

</form>
