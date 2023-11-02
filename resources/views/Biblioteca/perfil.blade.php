<?php
use App\Models\User;
use Illuminate\Support\Facades\DB;
$usuario_id = auth()->id();
#$user = DB::select("select * from users where id= ' $usuario_id' limit 1 ");
$user = User::where('id',$usuario_id)->first();

?>
<html>

<head>
    <link rel="stylesheet" href={{ asset('css/estilo.css') }}>

</head>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <a href="{{route ('home')}}"> Volver </a>
    <div class="card"> <i class="fa fa-align-cente" aria-hidden="true"></i>
        <img style="background-image: url('{{ asset('img/user.jpg') }}');" style="width:auto">
        <h1>{{ $user->name }}</h1>
        <h1>{{ $user->email }}</h1>
        <h5> cuenta creado el:</h5>
        <h5>{{ $user->created_at }}</h5>


        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>


    </div>
</body>

</html>
