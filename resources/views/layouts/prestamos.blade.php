<html style ="background-color:#84abca">

<head>


    <link rel="stylesheet" href={{ asset('css/estilo.css') }}>

</head>

<body style=" width:auto; height: auto; text-align:center; ">
    <?php
    use Illuminate\Support\Facades\DB;
    $usuId = auth()->id();
    //Join libros + prestamos
    $prestamos = DB::table('prestamos')
        ->select('libros.titulo', 'libros.id')
        ->join('users', 'users.id', '=', 'prestamos.usuario_id')
        ->join('libros', 'libros.id', '=', 'prestamos.libro_id')
        ->where('users.id', $usuId)
        ->whereNull('fecha_devolucion')
        ->get();
    
    ?>

    @foreach ($prestamos as $prestamo)
        <form method="POST" action="{{ route('DevolverLibro') }}">
            @csrf
            <div class="padreCard">
                <div class="cardHijo">
                    <p class="card-text">{{ $prestamo->titulo }}</p>
                    <input type="number"  class="inputInvisible" readonly name="id" value="{{ $prestamo->id }}" />
                    <button type="submit">Devolver</button>
                </div>
        </form>
    @endforeach
    </div>
    <a href="{{route('index')}}">Volver </a>
</body>

</html>
