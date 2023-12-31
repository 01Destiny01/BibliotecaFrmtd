<!DOCTYPE html>
<html style="background-image: url('{{ asset('img/biblio.jpg') }}')" > 
  <div id="loading">

<head>
    <meta charset='utf-8'>
    <title>Biblioteca</title>
    <link rel="stylesheet" href={{ asset('css/estilo.css') }}>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <div style="color:black; width:auto; height: auto; text-align:center; ">
        <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-0 shadow-sm" id="pillNav2" role="tablist">
            <li class="nav-item" role="presentation">
                <a href = "{{ route('showPrestamos') }}">
                    <button class="nav-link active rounded-2" id= "btnlibros" name="btnlibros" data-bs-toggle="tab"
                        type="summit" role="tab" aria-selected="true">LIBROS
                        ALQUILADOS</button>

            </li>
            <li class="nav-item">
                <a href="{{ route('show') }}">
                    <button class="nav-link active rounded-2" id="btnalquiler" name="btnalquiler" data-bs-toggle="tab"
                        type="button" role="tab" aria-selected="true">ALQUILAR
                    </button> </a>
            </li>
            <li class="nnav-item">
                <a href="{{route('publicarLibro')}}">
                    <button class="nav-link active rounded-2" id="btnpublicarlibro" name="btnpublicarlibro"
                        data-bs-toggle="tab" type="button" role="tab" aria-selected="true">PUBLICAR
                    </button> </a>
            </li>
            <li class="nav-item">
                <a href="{{route('perfil')}}">
                    <button class="nav-link active  rounded-2" id="btnPerfil" name = "btnPerfil" data-bs-toggle="tab"
                        type="button" role="tab" aria-selected="true">PERFIL</button>
            </li>

        </ul>

    </div>
</head>

<body>




</body>

</html>
