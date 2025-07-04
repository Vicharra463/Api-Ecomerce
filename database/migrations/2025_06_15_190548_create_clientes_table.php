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
        Schema::create('clientes', function (Blueprint $table) {
    $table->string('CODI_CLI')->primary();
    $table->string('Nombre');
    $table->string('Direccion');
    $table->string('Email')->unique();
    $table->string('Razon_Social');
    $table->char('RUC')->unique();
    $table->string('Telefono');
    $table->timestamp('Fecha_Registro')->useCurrent();
    $table->timestamp('Fecha_Actualizacion')->useCurrent();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
