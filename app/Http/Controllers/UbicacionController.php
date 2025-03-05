<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UbicacionController extends Controller
{
    /**
     * Muestra una lista de todas las ubicaciones.
     */
    public function index()
    {
        $ubicaciones = Ubicacion::all();
        return response()->json(['data' => $ubicaciones], 200);
    }

    /**
     * Almacena una nueva ubicación.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo_ubicacion' => 'required|string|unique:ubicaciones,codigo_ubicacion',
            'pais'             => 'required|string|max:255',
            'departamento'     => 'required|string|max:255',
            'provincia'        => 'required|string|max:255',
            'calle'            => 'required|string|max:255',
            'nro_hogar'        => 'nullable|string|max:50',
        ]);

        $ubicacion = Ubicacion::create($validatedData);

        return response()->json(['data' => $ubicacion], 201);
    }

    /**
     * Muestra una ubicación específica.
     */
    public function show($id)
    {
        $ubicacion = Ubicacion::find($id);
        if (!$ubicacion) {
            return response()->json(['error' => 'Ubicación no encontrada'], 404);
        }
        return response()->json(['data' => $ubicacion], 200);
    }

    /**
     * Actualiza una ubicación existente.
     */
    public function update(Request $request, $id)
    {
        $ubicacion = Ubicacion::find($id);
        if (!$ubicacion) {
            return response()->json(['error' => 'Ubicación no encontrada'], 404);
        }

        $validatedData = $request->validate([
            'codigo_ubicacion' => [
                'sometimes', 'required', 'string',
                Rule::unique('ubicaciones', 'codigo_ubicacion')->ignore($ubicacion->id),
            ],
            'pais'             => 'sometimes|required|string|max:255',
            'departamento'     => 'sometimes|required|string|max:255',
            'provincia'        => 'sometimes|required|string|max:255',
            'calle'            => 'sometimes|required|string|max:255',
            'nro_hogar'        => 'nullable|string|max:50',
        ]);

        $ubicacion->update($validatedData);

        return response()->json(['data' => $ubicacion], 200);
    }

    /**
     * Elimina una ubicación.
     */
    public function destroy($id)
    {
        $ubicacion = Ubicacion::find($id);
        if (!$ubicacion) {
            return response()->json(['error' => 'Ubicación no encontrada'], 404);
        }

        $ubicacion->delete();

        return response()->json(['message' => 'Ubicación eliminada exitosamente'], 200);
    }
}

