<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class librosController extends Controller
{
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
}
