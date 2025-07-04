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
        Schema::create('documentos', function (Blueprint $table) {
    $table->string('COD_PED')->primary();
    $table->string('COD_CLIE');
    $table->decimal('PRE_TOTAL', 10, 2);
    $table->enum('Tipo', ['boleta', 'factura', 'otro']);
    $table->timestamp('Fecha_Registro')->useCurrent();
    $table->timestamp('Fecha_Actualizacion')->useCurrent();

    // 🔗 Relación con clientes
    $table->foreign('COD_CLIE')->references('CODI_CLI')->on('clientes')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
