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
        Schema::create('detalle_documentos', function (Blueprint $table) {
    $table->bigIncrements('ID');
    $table->string('COD_PEDI');
    $table->unsignedBigInteger('ID_PROD');
    $table->integer('CANTIDAD');
    $table->decimal('PRECIO_CANT', 10, 2);
    $table->decimal('TOTAL', 10, 2);
    $table->timestamp('Fecha_Registro')->useCurrent();
    $table->timestamp('Fecha_Actualizacion')->useCurrent();

    // 🔗 Relaciones
    $table->foreign('COD_PEDI')->references('COD_PED')->on('documentos')->onDelete('cascade');
    $table->foreign('ID_PROD')->references('id')->on('productos')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_documentos');
    }
};
