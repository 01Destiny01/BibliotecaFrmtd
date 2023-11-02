<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $table = 'prestamos';

 

    protected $fillable = [
        'libro_id',
        'usuario_id',
        'created_at',
        'updated_at',
        'fecha_devolucion'
    ];
}
