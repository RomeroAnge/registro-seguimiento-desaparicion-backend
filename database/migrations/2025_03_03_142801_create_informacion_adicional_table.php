<?php
// 8. Migration: CreateInformacionAdicionalTable

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacionAdicionalTable extends Migration {
    public function up() {
        Schema::create('informacion_adicional', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_informacion')->unique();
            $table->string('tipo'); // "Evidencia Visual", "Avistamiento/Pista"
            $table->text('descripcion');
            $table->string('formato'); // "JPEG", "MP4", "PDF", etc.
            $table->timestamp('fecha_registro');
            $table->string('codigo_ubicacion'); // FK a ubicaciones.codigo_ubicacion (obligatoria)
            $table->timestamps();
            $table->foreign('codigo_ubicacion')->references('codigo_ubicacion')->on('ubicaciones')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('informacion_adicional');
    }
}
