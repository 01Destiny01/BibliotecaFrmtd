<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibliotecaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('home', [HomeController::class]);
})-> name('home');
Route::middleware(['auth'])->group(function(){
 

 

});
Auth::routes();
Route::controller(BibliotecaController::class)->group(function(){
    Route::get('/home', [App\Http\Controllers\BibliotecaController::class, 'index'])->name('home');
    //Route::get('/Biblioteca/index', [App\Http\Controllers\BibliotecaController::class, 'index'])->name('biblioteca');
    Route::post('/Biblioteca/create/', [App\Http\Controllers\BibliotecaController::class, 'alquilarLibro'])->name('alquilar');
    Route::get('/Biblioteca/publicar', [App\Http\Controllers\BibliotecaController::class, 'publicarLibro'])->name('publicarLibro');
    Route::post('/Biblioteca/publicarGuardar', [App\Http\Controllers\BibliotecaController::class, 'storePublicar'])->name('storePublicar');
    Route::post('/Biblioteca/showprestamos', [App\Http\Controllers\BibliotecaController::class, 'DevolverLibro'])->name('DevolverLibro');
    Route::get('/Biblioteca/getperfil', [App\Http\Controllers\BibliotecaController::class, 'getperfil'])->name('perfil');
    Route::get('/Biblioteca/logout', [App\Http\Controllers\BibliotecaController::class, 'cerrarsesion']);
    Route::get('/Biblioteca/show', [App\Http\Controllers\librosController::class, 'showLibros'])->name('show');    
   // Route::get('/Biblioteca/detalleLibro', [App\Http\Controllers\BibliotecaController::class, 'showDetalleLibros({id})']); 
     Route::get('/Biblioteca/detalleLibro{id}',  [App\Http\Controllers\librosController::class, 'showDetalleLibros'])->name('mostrarDetalle');
    Route::match(array('GET','POST'),('/Biblioteca/showLibrosPrestados'), [App\Http\Controllers\BibliotecaController::class, 'showLibrosPrestados'])->name('showPrestamos');
    
});



//Route::get('Biblioteca/create','create');
//Route::get('Biblioteca/show','show')->name('show');

#Route::get('Biblioteca/index','index');

//Route::get('Biblioteca/show','create');





?>






