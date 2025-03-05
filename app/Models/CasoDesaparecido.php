<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasoDesaparecido extends Model
{
    use HasFactory;

    protected $table = 'caso_desaparecidos';

    protected $fillable = [
        'codigo_caso',
        'nombre',
        'descripcion',
        'fecha',
        'estado',
        'identificador_unico',
        'reporte_desaparicion_id',
        'codigo_responsable',
    ];
}
