<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoridadesTable extends Migration {
    public function up() {
        Schema::create('autoridades', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_usuario')->unique();
            $table->string('departamento');
            $table->timestamps();

            $table->foreign('codigo_usuario')->references('codigo_usuario')->on('users')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('autoridades');
    }
}
