<?php
// 2. Migration: CreateFamiliaresTable

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliaresTable extends Migration {
    public function up() {
        Schema::create('familiares', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_usuario')->unique(); // FK a users.codigo_usuario
            $table->string('direccion');
            $table->timestamps();
            $table->foreign('codigo_usuario')->references('codigo_usuario')->on('users')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('familiares');
    }
}
