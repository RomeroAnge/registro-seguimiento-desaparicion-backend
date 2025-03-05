<?php

namespace App\Http\Controllers;

use App\Models\ReporteDesaparicion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReporteDesaparicionController extends Controller
{
    /**
     * Muestra una lista de todos los reportes.
     */
    public function index()
    {
        $reportes = ReporteDesaparicion::all();
        return response()->json(['data' => $reportes], 200);
    }

    /**
     * Almacena un nuevo reporte de desaparición.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo_reporte'   => 'required|string|unique:reporte_desaparicion,codigo_reporte',
            'nombre'                => 'required|string|max:255',
            'descripcion'           => 'required|string',
            'codigo_ubicacion' => 'required|string|exists:ubicaciones,codigo_ubicacion',
            'fotografias'      => 'nullable|string',
            // Si se desea validar cada elemento del arreglo, por ejemplo, que sea una URL:
            // 'fotografias.*'   => 'url',
            'estado_reporte'   => ['required', 'string', Rule::in(['Pendiente', 'Validado', 'Rechazado'])],
            'codigo_usuario'   => 'required|string|exists:users,codigo_usuario',
        ]);

        $reporte = ReporteDesaparicion::create($validatedData);

        return response()->json(['data' => $reporte], 201);
    }

    /**
     * Muestra un reporte específico.
     */
    public function show($id)
    {
        $reporte = ReporteDesaparicion::find($id);

        if (!$reporte) {
            return response()->json(['error' => 'Reporte no encontrado'], 404);
        }

        return response()->json(['data' => $reporte], 200);
    }

    /**
     * Actualiza un reporte existente.
     */
    public function update(Request $request, $id)
    {
        $reporte = ReporteDesaparicion::find($id);

        if (!$reporte) {
            return response()->json(['error' => 'Reporte no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'codigo_reporte'   => [
                'sometimes', 'required', 'string',
                Rule::unique('reporte_desaparicion', 'codigo_reporte')->ignore($reporte->id),
            ],
            
            'codigo_ubicacion' => 'sometimes|required|string|exists:ubicaciones,codigo_ubicacion',
            'fotografias'      => 'nullable|string',
            'estado_reporte'   => [
                'sometimes', 'required', 'string',
                Rule::in(['Pendiente', 'Validado', 'Rechazado']),
            ],
            'codigo_usuario'   => 'sometimes|required|string|exists:users,codigo_usuario',
        ]);

        $reporte->update($validatedData);

        return response()->json(['data' => $reporte], 200);
    }

    /**
     * Elimina un reporte.
     */
    public function destroy($id)
    {
        $reporte = ReporteDesaparicion::find($id);

        if (!$reporte) {
            return response()->json(['error' => 'Reporte no encontrado'], 404);
        }

        $reporte->delete();

        return response()->json(['message' => 'Reporte eliminado exitosamente'], 200);
    }
}

