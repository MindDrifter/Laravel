@extends('layouts.app')

@section('content')
<div class="container  d-flex flex-row flex-wrap align-items-center">


        @if(!$myCards)
            <h3>У вас еще нету карточек</h3>
        @else
        <div class="card-group"></div>
            @for($i = 0; $i < count($myCards); $i++)
                <div class="card m-4 p-3 d-flex justify-content-center  align-items-center" style="max-width: 18rem; width: 100%; list-style: none">
                    @for($j = 0; $j < 3; $j++)

                    <div class="">{{$myCards[$i][$j]}}</div>

                    @endfor
                    <a style="display: block" class="btn btn-danger" href="{{route('delete_card', $myCardId[$i] )}}">Удалить</a>
                </div>
            @endfor
        @endif
            <div class="card m-4 p-3 d-flex justify-content-center  align-items-center" style="max-width: 18rem; width: 100%; list-style: none">
                <a class="btn btn-success" href="{{route('add_card')}}">Добавить карту</a>
            </div>
        </div>

</div>
@endsection
