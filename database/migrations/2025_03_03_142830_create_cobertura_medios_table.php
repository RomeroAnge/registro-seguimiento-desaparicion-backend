<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoberturaMediosTable extends Migration {
    public function up() {
        Schema::create('cobertura_medios', function (Blueprint $table) {
            $table->id(); // idCobertura
            $table->text('nota');
            $table->string('redes_sociales');
            $table->timestamp('fecha_publicacion');
            $table->unsignedBigInteger('caso_desaparecidos_id');
            $table->timestamps();
            $table->foreign('caso_desaparecidos_id')->references('id')->on('caso_desaparecidos')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('cobertura_medios');
    }
}
