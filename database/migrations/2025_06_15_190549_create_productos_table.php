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
        Schema::create('productos', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('codigo')->unique();
    $table->string('nombre');
    $table->string('descripcion');
    $table->string('imagen');
    $table->decimal('precio', 10, 2);
    $table->integer('stock');
    $table->unsignedBigInteger('ID_CAT');
    $table->timestamp('fecha_registro')->useCurrent();
    $table->timestamp('fecha_actualizacion')->useCurrent();

    // 🔗 Relación con categoría
    $table->foreign('ID_CAT')->references('id')->on('categoria')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
