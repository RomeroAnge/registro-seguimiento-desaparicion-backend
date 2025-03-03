<?php
// 9. Migration: CreateRegistroAnalisisTable

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroAnalisisTable extends Migration {
    public function up() {
        Schema::create('registro_analisis', function (Blueprint $table) {
            $table->id(); // idAnalisis
            $table->timestamp('fecha_analisis');
            $table->string('resultado'); // "Aceptada", "Rechazada", "Pendiente"
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('informacion_adicional_id')->nullable();
            $table->timestamps();
            $table->foreign('informacion_adicional_id')->references('id')->on('informacion_adicional')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('registro_analisis');
    }
}
