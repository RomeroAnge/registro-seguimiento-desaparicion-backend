<?php

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
            $table->string('codigo_ubicacion'); // FK a ubicaciones.codigo_ubicacion (OBLIGATORIA)
            $table->unsignedBigInteger('caso_desaparecido_id'); // A qué caso pertenece
            $table->string('codigo_usuario'); // Quién envía la información (Familiar o Comunidad)
            $table->timestamps();

            $table->foreign('codigo_ubicacion')->references('codigo_ubicacion')->on('ubicaciones')->onDelete('cascade');
            $table->foreign('caso_desaparecido_id')->references('id')->on('caso_desaparecidos')->onDelete('cascade');
            $table->foreign('codigo_usuario')->references('codigo_usuario')->on('users')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('informacion_adicional');
    }
}
