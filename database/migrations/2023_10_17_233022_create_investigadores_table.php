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
        Schema::create('investigadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('unidad_academica'); // UALP, UASC, UACB, UAT, UAR
            $table->unsignedBigInteger('proyecto_id'); // Clave foránea para relacionar con proyectos
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investigadores');
    }
};
