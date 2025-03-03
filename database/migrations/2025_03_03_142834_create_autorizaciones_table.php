<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorizacionesTable extends Migration {
    public function up() {
        Schema::create('autorizaciones', function (Blueprint $table) {
            $table->id(); // idAutorizacion
            $table->timestamp('fecha_autorizacion');
            $table->string('estado_acceso'); // "Activo", "Inactivo"
            $table->string('codigo_usuario'); // FK a users.codigo_usuario
            $table->unsignedBigInteger('caso_desaparecido_id'); // FK a caso_desaparecidos.id
            $table->timestamps();
            $table->foreign('codigo_usuario')->references('codigo_usuario')->on('users')->onDelete('cascade');
            $table->foreign('caso_desaparecido_id')->references('id')->on('caso_desaparecidos')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('autorizaciones');
    }
}
