<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use Illuminate\Support\Facades\DB;

class prestamosController extends Controller
{



    function mensaje_alert($message)
    {

        // Display the alert box  
        echo "<script>alert('$message');</script>";
    }
    public function alquilarLibro(Request $request)
    {
        $usuarioid = auth()->id();
        $libroid = $request['libro_id'];
        $p = Prestamo::where('usuario_id', $usuarioid)
        ->where('libro_id',$libroid)
        ->whereNull('fecha_devolucion')
        ->first();
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
    

    public function DevolverLibro(Request $request)
    {
        $date = date('Y-m-d H:i:s');
        $libroId = $request['id'];
        $registro = Prestamo::where('libro_id', $libroId)
        ->whereNull('fecha_devolucion')
        ->first();
        if ($registro != null) {
            $registro->update([
                'fecha_devolucion' => $date
            ]);
        } else echo 'este usuario no tiene prestamos';

        return view('Biblioteca.showprestamos');
    }
}
