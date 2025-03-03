<?php
// 5. Migration: CreateUbicacionesTable

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbicacionesTable extends Migration {
    public function up() {
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_ubicacion')->unique();
            $table->string('pais');
            $table->string('departamento');
            $table->string('provincia');
            $table->string('calle');
            $table->string('nro_hogar')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('ubicaciones');
    }
}
