<?php
// 11. Migration: CreateNotificacionesTable

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacionesTable extends Migration {
    public function up() {
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id(); // idNotificacion
            $table->text('mensaje');
            $table->timestamp('fecha_envio');
            $table->string('estado'); // "Enviada", "Leída"
            $table->unsignedBigInteger('caso_desaparecido_id')->nullable();
            $table->timestamps();
            $table->foreign('caso_desaparecido_id')->references('id')->on('caso_desaparecidos')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('notificaciones');
    }
}
