<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $table = 'libros';

 

    protected $fillable = [
        'titulo',
        'editorial',
        'idAutor',
        'ano_escritura',
        'updated_at',
        'created_at'
    ];
}
