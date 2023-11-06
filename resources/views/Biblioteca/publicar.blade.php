<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset('css/estiloBiblioteca.css') }}>
    <title>Crear libro</title>
</head>

<body>
    <a href="{{route('index')}}">Volver </a>
    <h1>Formulario de Creación de Libro</h1>
    
    <form class="login-box" action="{{ route('storePublicar') }}" method="post">
        @csrf
        <label for="titulo">Título del Libro:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="editorial">Editorial:</label>
        <input type="text" id="editorial" name="editorial" required><br><br>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required><br><br>

        <label for="ano_escritura">Año escritura:</label><br>
        <input id="ano_escritura" name="ano_escritura" required><br><br>

        <input type="submit" value="Crear Libro">
 
    </form>
           
  
</body>

</html>
