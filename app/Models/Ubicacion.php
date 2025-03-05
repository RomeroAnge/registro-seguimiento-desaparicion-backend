<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $table = 'ubicaciones';

    protected $fillable = [
        'codigo_ubicacion',
        'pais',
        'departamento',
        'provincia',
        'calle',
        'nro_hogar',
    ];
}
