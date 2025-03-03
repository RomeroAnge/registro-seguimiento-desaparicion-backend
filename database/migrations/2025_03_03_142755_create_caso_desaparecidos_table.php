<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasoDesaparecidosTable extends Migration {
    public function up() {
        Schema::create('caso_desaparecidos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_caso')->unique();
            $table->string('nombre');
            $table->text('descripcion');
            $table->date('fecha');
            $table->string('estado'); // "En investigación", "Información verificada", "Cerrado"
            $table->string('identificador_unico');
            // Opcional: referencia al reporte que generó el caso (puede ser nulo)
            $table->unsignedBigInteger('reporte_desaparicion_id')->nullable();
            // Referencia al responsable (Autoridad)
            $table->string('codigo_responsable'); // FK a users.codigo_usuario (de rol Autoridad)
            $table->timestamps();

            $table->foreign('reporte_desaparicion_id')->references('id')->on('reporte_desaparicion')->onDelete('set null');
            $table->foreign('codigo_responsable')->references('codigo_usuario')->on('users')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('caso_desaparecidos');
    }
}
