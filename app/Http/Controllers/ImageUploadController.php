<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'codigo_reporte' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $codigoReporte = $request->input('codigo_reporte');
            
            // Obtener la extensión del archivo original
            $extension = $image->getClientOriginalExtension();
            
            // Crear el nombre del archivo con el código del reporte
            $filename = $codigoReporte . '.' . $extension;
            
            // Guardar la imagen en la carpeta 'foto' dentro de 'public'
            // Si la carpeta no existe, se creará automáticamente
            $path = $image->storeAs('foto', $filename, 'public');
            
            return response()->json([
                'success' => true,
                'path' => $path,
                'url' => Storage::url($path)
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No se pudo subir la imagen'
        ], 400);
    }
}