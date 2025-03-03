<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialEstadosTable extends Migration {
    public function up() {
        Schema::create('historial_estados', function (Blueprint $table) {
            $table->id(); // idHistorial
            $table->timestamp('fecha_cambio');
            $table->string('estado_anterior');
            $table->string('estado_nuevo');
            $table->unsignedBigInteger('caso_desaparecido_id');
            $table->timestamps();
            $table->foreign('caso_desaparecido_id')->references('id')->on('caso_desaparecidos')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('historial_estados');
    }
}
