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
return view("Biblioteca.index");
  
    }
    
    public function cerrarsesion()
    {
        return view('Biblioteca.logout');
    }
    // show mostrara los prestamos del usuario
 
    
    public function getperfil()
    {


        //$user = DB::select('select * from users  ');
        $usuario_id =  auth()->id();

        // $user = DB::select("select * from users where id= ' $usuario_id' limit  1;");
        return view('Biblioteca.perfil');
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
            return redirect( route('publicarLibro'))
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




    public function  showLibrosPrestados()
    {

        return view('Biblioteca.showprestamos');
    }
}
