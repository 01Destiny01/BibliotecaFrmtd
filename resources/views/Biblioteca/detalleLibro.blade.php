<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('css/estiloBiblioteca.css') }}>
    <title>{{ $libro->titulo }}</title>

</head>
<form method="POST"  action="{{ route('alquilar') }}">
    @csrf
    <body  style="background-image: url('{{ asset('img/biblio.jpg') }}')"> 
        <div  class="divBack">
        <h1 class="h1_detalle">{{ $libro->titulo }}</h1>
        <div>{{ $libro->editorial }}
        </div>

        {{ $libro->autorlibro }}
        <div>
            {{ $libro->ano_escritura }}
        </div>
        <div>
            <input type="submit" class='hidden-text-input' name="libro_id" value="{{$libro->id}}" title="ALQUILAR" placeholder="alquilar">Alquilar</button>

        </div>
    </div>
</form>
</body>

</html>
