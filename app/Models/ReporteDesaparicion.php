<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteDesaparicion extends Model
{
    use HasFactory;

    protected $table = 'reporte_desaparicion';

    protected $fillable = [
        'codigo_reporte',
        'datos_personales',
        'codigo_ubicacion',
        'fotografias',
        'estado_reporte',
        'codigo_usuario',
    ];

    // Permite que Laravel convierta automáticamente la columna JSON a un array.
    protected $casts = [
        'fotografias' => 'array',
    ];
}
