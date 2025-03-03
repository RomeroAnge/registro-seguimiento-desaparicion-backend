<?php
// 3. Migration: CreateComunidadesTable

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunidadesTable extends Migration {
    public function up() {
        Schema::create('comunidades', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_usuario')->unique(); // FK a users.codigo_usuario
            $table->string('descripcion_comunidad');
            $table->timestamps();
            $table->foreign('codigo_usuario')->references('codigo_usuario')->on('users')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('comunidades');
    }
}
