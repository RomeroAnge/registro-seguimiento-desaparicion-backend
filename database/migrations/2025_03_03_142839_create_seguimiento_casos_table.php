<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoCasosTable extends Migration {
    public function up() {
        Schema::create('seguimiento_casos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_seguimiento')->unique();
            $table->timestamp('fecha_seguimiento');
            $table->text('observaciones');
            $table->string('estado_actual'); // Estado del caso en el momento del seguimiento
            $table->unsignedBigInteger('caso_desaparecido_id');
            $table->timestamps();
            $table->foreign('caso_desaparecido_id')->references('id')->on('caso_desaparecidos')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('seguimiento_casos');
    }
}
