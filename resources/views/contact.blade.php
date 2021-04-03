@extends('layouts.app')

@section('title-block') Home @endsection

@section('content')

<h1>Contacts</h1>



<form method="post" action="{{route('contact_submit')}}" style="display: flex; flex-direction: column; align-items: center;">
    @csrf
    <input class="input-group-text m-3" type="text" name="name" id="name" placeholder="Введите имя" >
    <input class="input-group-text m-3" type="email" name="mail" id="mail" placeholder="Введите mail" >
   <div class="form-floating">
        <textarea class="form-control"  style="resize: none; height: 300px; width: 400px;" name="area" id="area" ></textarea>
        <label for="area">Сообщение</label>
   </div>
    <button type="submit">Подтвердить</button>
</form>

@endsection


