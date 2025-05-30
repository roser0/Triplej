<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_estudiante');
            $table->unsignedBigInteger('id_usuario_admin');
            $table->dateTime('fecha_expedicion');
            $table->integer('horas_totales');
            $table->boolean('entregado')->default('0');
            $table->timestamps();

            $table->foreign('id_estudiante')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('id_usuario_admin')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
