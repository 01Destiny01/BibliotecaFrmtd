<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('css/estiloBiblioteca.css') }}>
    <title>{{ $libro->titulo }}</title>

</head>
<form method="POST" class="login-box"  action="{{ route('alquilar') }}">
    @csrf
    <body  style="background-image: url('{{ asset('img/biblio.jpg') }}')"> 
  
        <div  class="login-box">
        <h1 class="h1_detalle">{{ $libro->titulo }}</h1>
        <div> <h1 class="h1_detalle "> [editorial]</h1>
        </div>
        <div><h3 class="h1Yello">{{ $libro->editorial }}</h3></div>

        <h1 class="h1Yello">{{ $libro->autorlibro }}</h1>
        <div>
           <h1 class="h1Yello"> {{ $libro->ano_escritura }}</h1>
        </div>
        <div>
            <input type="submit"  name="libro_id" value="{{$libro->id}}" title="ALQUILAR" placeholder="alquilar" aria-valuetext="Alquilar">Alquilar</button>

        </div>
    </div>
</form>
</body>

</html>
