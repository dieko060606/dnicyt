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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('categoria', ['formativo', 'profesionalizante', 'institucional', 'tecnologico', 'militar']);
            //$table->json('investigadores'); // Puede ser un array JSON para almacenar hasta tres investigadores
            //$table->json('investigadores')->default('')->nullable(); 
            $table->string('brochure_path'); // Ruta del brochure en el servidor
            $table->string('unidad_academica'); // UALP, UASC, UACB, UAT, UAR
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
