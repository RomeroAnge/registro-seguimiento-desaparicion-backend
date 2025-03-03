<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteDesaparicionTable extends Migration {
    public function up() {
        Schema::create('reporte_desaparicion', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_reporte')->unique();
            $table->text('datos_personales');
            $table->string('codigo_ubicacion'); // FK a ubicaciones.codigo_ubicacion
            $table->json('fotografias')->nullable();
            $table->string('estado_reporte'); // "Pendiente", "Validado", "Rechazado"
            $table->string('codigo_usuario'); // FK a users.codigo_usuario (de rol Familiar)
            $table->timestamps();

            $table->foreign('codigo_ubicacion')->references('codigo_ubicacion')->on('ubicaciones')->onDelete('cascade');
            $table->foreign('codigo_usuario')->references('codigo_usuario')->on('users')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('reporte_desaparicion');
    }
}
