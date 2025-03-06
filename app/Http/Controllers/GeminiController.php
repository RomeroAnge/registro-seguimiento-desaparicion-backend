<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeminiController extends Controller
{
    public function generateContent(Request $request)
    {
        $request->validate([
            'text' => 'required|string'
        ]);

        $key = env('GEMINI_API_KEY');
        $response = Http::post('https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key='. $key , [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $request->text]
                    ]
                ]
            ]
        ]);

        if ($response->successful()) {
            return response()->json([
                'message' => $response->json()['candidates'][0]['content']['parts'][0]['text']
            ]);
        } else {
            return response()->json(['error' => 'Hubo un error al procesar la solicitud'], 500);
        }
    }
}
