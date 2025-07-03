<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoAgricola extends Model
{
    protected $table = 'productos_agricolas';
     protected $fillable = [
        'nombre',
        'variedad',
        'origen',
        'fecha_cosecha',
        'peso',
        'precio_kilo',
        'calidad',
        'estado'
    ];
}
