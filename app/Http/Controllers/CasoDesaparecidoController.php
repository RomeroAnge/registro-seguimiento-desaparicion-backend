<?php

namespace App\Http\Controllers;

use App\Models\CasoDesaparecido;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CasoDesaparecidoController extends Controller
{
    /**
     * Muestra una lista de todos los casos.
     */
    public function index()
    {
        $casos = CasoDesaparecido::all();
        return response()->json(['data' => $casos], 200);
    }

    /**
     * Almacena un nuevo caso desaparecido.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'codigo_caso'           => 'required|string|unique:caso_desaparecidos,codigo_caso',
            'nombre'                => 'required|string|max:255',
            'descripcion'           => 'required|string',
            'fecha'                 => 'required|date',
            'estado'                => ['required', 'string', Rule::in(['En investigación', 'Información verificada', 'Cerrado'])],
            'identificador_unico'   => 'required|string',
            'reporte_desaparicion_id' => 'nullable|exists:reporte_desaparicion,id',
            'codigo_responsable'    => 'required|string|exists:users,codigo_usuario',
        ]);

        // Crear el caso
        $caso = CasoDesaparecido::create($validatedData);

        return response()->json(['data' => $caso], 201);
    }

    /**
     * Muestra un caso específico.
     */
    public function show($id)
    {
        $caso = CasoDesaparecido::find($id);
        if (!$caso) {
            return response()->json(['error' => 'Caso no encontrado'], 404);
        }
        return response()->json(['data' => $caso], 200);
    }

    /**
     * Actualiza un caso existente.
     */
    public function update(Request $request, $id)
    {
        $caso = CasoDesaparecido::find($id);
        if (!$caso) {
            return response()->json(['error' => 'Caso no encontrado'], 404);
        }

        // Validar los datos (usando 'sometimes' para campos opcionales)
        $validatedData = $request->validate([
            'codigo_caso'           => ['sometimes', 'required', 'string', Rule::unique('caso_desaparecidos', 'codigo_caso')->ignore($caso->id)],
            'nombre'                => 'sometimes|required|string|max:255',
            'descripcion'           => 'sometimes|required|string',
            'fecha'                 => 'sometimes|required|date',
            'estado'                => ['sometimes', 'required', 'string', Rule::in(['En investigación', 'Información verificada', 'Cerrado'])],
            'identificador_unico'   => 'sometimes|required|string',
            'reporte_desaparicion_id' => 'nullable|exists:reporte_desaparicion,id',
            'codigo_responsable'    => 'sometimes|required|string|exists:users,codigo_usuario',
        ]);

        $caso->update($validatedData);

        return response()->json(['data' => $caso], 200);
    }

    /**
     * Elimina un caso.
     */
    public function destroy($id)
    {
        $caso = CasoDesaparecido::find($id);
        if (!$caso) {
            return response()->json(['error' => 'Caso no encontrado'], 404);
        }

        $caso->delete();

        return response()->json(['message' => 'Caso eliminado exitosamente'], 200);
    }
}

