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
        Schema::create('usuarios', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('Nombre');
    $table->string('password');
    $table->enum('Rol', ['admin', 'cliente', 'otro']);
    $table->string('COD_CLI');
    $table->timestamp('Fecha_Registro')->useCurrent();
    $table->timestamp('Fecha_Actualizacion')->useCurrent();

    // 🔗 Relación con clientes
    $table->foreign('COD_CLI')->references('CODI_CLI')->on('clientes')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
