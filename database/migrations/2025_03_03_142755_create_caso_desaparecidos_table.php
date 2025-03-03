<?php
// 7. Migration: CreateCasoDesaparecidosTable

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
            $table->string('codigo_responsable'); // FK al usuario (Autoridad) que es responsable (puede referenciar a users.codigo_usuario)
            $table->timestamps();
            // Puedes definir una FK si lo deseas, por ejemplo:
            // $table->foreign('codigo_responsable')->references('codigo_usuario')->on('users')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('caso_desaparecidos');
    }
}
