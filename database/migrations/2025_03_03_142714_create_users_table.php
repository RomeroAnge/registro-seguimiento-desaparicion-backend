<?php
// 1. Migration: CreateUsersTable

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key (auto-increment)
            $table->string('codigo_usuario')->unique();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('rol', ['Familiar', 'Comunidad', 'Autoridad']);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('users');
    }
}
