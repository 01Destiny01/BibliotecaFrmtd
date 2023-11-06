<html style ="background-color:#84abca">

<head>
    <link rel="stylesheet" href={{ asset('css/estilo.css') }}>


</head>

<body style=" width:auto; height: auto; text-align:center; ">
    <?php
    
    use Illuminate\Support\Facades\DB;
    $libros = DB::table('libros')
        ->select('*')
        ->get();
    session_start();
    ?>

    <a href="{{ route('index') }}"> Volver</button>
        @foreach ($libros as $libro)
            <form method="POST">
                @csrf
                <div class="padreCard">
                    <div class="cardHijo">
                        <p class="card-text">{{ $libro->titulo }}</p>
                        <p class="autorlibro">{{ $libro->editorial }}</p>
                        <input type="number" readonly name="libro_id" value="{{ $libro->id }}" />
                        <a href="{{ route('mostrarDetalle', [$libro->id]) }}">Ver en detalle</a>
                    </div>
            </form>
        @endforeach


        </div>

</body>

</html>
