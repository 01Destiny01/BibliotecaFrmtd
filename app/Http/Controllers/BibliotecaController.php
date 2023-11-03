<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\autores_libros;
use App\Models\Libro;
use Illuminate\Support\Facades\Validator;
use App\Models\Prestamo;
use App\Models\Usuario;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\table;

class BibliotecaController extends Controller
{
    public function index()
    {

        return view('Biblioteca.index');
    }
    // public function index()
    // {

    // }

    //create creara un nuevo prestamo 

    public function getlibros()
    {
    }
    public function cerrarsesion()
    {
        return view('Biblioteca.logout');
    }
    // show mostrara los prestamos del usuario
    public function showLibros()
    {
        $libros = DB::table('libros')
            ->select('*')->get();
        return view('Biblioteca.show', ['libros' => $libros]);
    }
    public function showDetalleLibros($id)
    {

        $libro = Libro::find($id);
        return view('Biblioteca.detalleLibro', ['libro' => $libro]);
    }
    public function getperfil()
    {


        //$user = DB::select('select * from users  ');
        $usuario_id =  auth()->id();

        // $user = DB::select("select * from users where id= ' $usuario_id' limit  1;");
        return view('Biblioteca.perfil');
    }

    public function alquilarLibro(Request $request)
    {
        $usuarioid = auth()->id();
        $libroid = $request['libro_id'];
        $p = DB::select("select * from prestamos where usuario_id = ' $usuarioid 'and libro_id = ' $libroid' ");
        if ($p == null) {
            $prestamo = new Prestamo;
            $prestamo->libro_id = $request['libro_id'];
            $prestamo->usuario_id = auth()->id();


            $prestamo->save();
            $this->mensaje_alert("Prestamo completado!");
            return view('Biblioteca.show');
        } else {
            $this->mensaje_alert("error, este libro ya ha sido prestado a este usuario y todavia no ha sido devuelto");
            return view('Biblioteca.show');
        };
    }
    function mensaje_alert($message)
    {

        // Display the alert box  
        echo "<script>alert('$message');</script>";
    }
    public function publicarLibro(Request $request)
    {
        return view('Biblioteca.publicar');
    }

    public function storePublicar(Request $request)
    {
        Log::debug(json_encode($request->all()));
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|unique:Libros|max:255',
            'editorial' => 'required|unique:Libros|max:255',
            'autor' => 'required',
            'ano_escritura' => 'required|integer|min:1900',
        ]);

        if ($validator->fails()) {
            return redirect('/Biblioteca/publicar')
                ->withErrors($validator)
                ->withInput();
            //echo json_encode($validator);
            //var_dump($validator->messages()); exit;
            //var_dump("sale", json_encode($validator->messages())); exit;
            //Log::debug(json_encode($validator));
        }

        $autorR = $request['autor'];
        $autor = DB::table('autores')
            ->where('nombre', $autorR)
            ->first();
        $idautor = -1;
        if ($autor == null) {
            $au = new Autor;
            $au->nombre = $request['autor'];
            $au->save();
            $autorN = DB::table('autores')
                ->where('nombre', $autorR)->first();
            $idautor = $autorN->id;
        } elseif ($autor != null) {
            $idautor = $autor->id;
        }
        $libro = new Libro;
        $libro->titulo = $request['titulo'];
        $libro->editorial = $request['editorial'];
        $libro->idAutor = $idautor;
        $libro->ano_escritura = $request['ano_escritura'];
        $libro->save();
        $libroR = DB::table('libros')
            ->where('titulo', $libro->titulo)->first();

        $au_libros = new autores_libros;
        $au_libros->autor_id = $idautor;
        $au_libros->libro_id = $libroR->id;
        $au_libros->save();
        return view('Biblioteca.index');
    }



    public function DevolverLibro(Request $request)
    {
        $date = date('Y-m-d H:i:s');
        $libroId = $request['id'];
        $registro = Prestamo::where('libro_id', $libroId)->first();
        if ($registro != null) {
            $registro->update([
                'fecha_devolucion' => $date
            ]);
        } else echo 'este usuario no tiene prestamos';

        return view('Biblioteca.showprestamos');
    }
    public function  showLibrosPrestados()
    {

        return view('Biblioteca.showprestamos');
    }
}
