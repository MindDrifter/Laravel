@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li class="alert alert-danger">{{$error}} </li>
        @endforeach
    </ul>
@endif


@if(session('success'))
        <span  class="alert alert-success"> {{ session('success' ) }}</span>
@endif

@if(session('failed'))
    <span  class="alert alert-danger"> {{ session('failed' ) }}</span>
@endif

