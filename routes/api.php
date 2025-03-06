<?php

use App\Http\Controllers\CasoDesaparecidoController;
use App\Http\Controllers\ReporteDesaparicionController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\ImageUploadController;

Route::apiResource('caso-desaparecidos', CasoDesaparecidoController::class);
Route::apiResource('reporte-desaparicion', ReporteDesaparicionController::class);
Route::apiResource('ubicaciones', UbicacionController::class);

Route::post('/upload-image', [ImageUploadController::class, 'store']);