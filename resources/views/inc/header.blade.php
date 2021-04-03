@section('header')
<div  class="navbar  navbar-dark bg-dark">

   <div  style="display: flex; justify-content: space-between; flex-direction: row; align-items: center" class="container  collapse navbar-collapse" id="navbarSupportedContent">
        <ul style="list-style: none" class="d-flex justify-content-around text-justify " >

            <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Главная</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('contact_form')}}">Контакты</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('contact_messages')}}">Все сообщения</a></li>

            @if(\Illuminate\Support\Facades\Cookie::has('email'))
                <li class="nav-item" ><a class="nav-link" href="{{route('user_cards')}}">Мои карты</a></li>
            @else
                <li class="nav-link" ><a class="" style="text-decoration: none" href="{{route('login')}}">Войдите</a>
                    <span style="color: white;">или</span>
                    <a style="text-decoration: none"  href="{{route('register')}}">Зарегестрируйтесь</a>, чтобы управлять карточками
                </li>
            @endif
        </ul>


       @if(\Illuminate\Support\Facades\Cookie::has('email'))
        <div>
            <span style="color: white">{{\Illuminate\Support\Facades\Cookie::get('email')}}</span>
            <a class="nav-item nav-link" href="{{route('logout')}}">Выйти</a>
       </div>
       @else
           <div>
               <a class="nav-item nav-link" href="{{route('login')}}">Войти</a>
               <a class="nav-item nav-link" href="{{route('register')}}">Регистрация</a>
           </div>
       @endif
   </div>
    @show
</div>
