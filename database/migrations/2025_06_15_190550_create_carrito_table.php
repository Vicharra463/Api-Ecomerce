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
        Schema::create('carrito', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->integer('CANTIDAD');
    $table->string('COD_CLI');
    $table->unsignedBigInteger('ID_PROD');

    // 🔗 Relaciones
    $table->foreign('COD_CLI')->references('CODI_CLI')->on('clientes')->onDelete('cascade');
    $table->foreign('ID_PROD')->references('id')->on('productos')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito');
    }
};
