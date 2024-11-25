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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('codigo_barra')->unique()->nullable();
            $table->integer('cantidad_stock');

            $table->boolean('es_insumo')->default(false);

            $table->unsignedBigInteger('categoria_articulos_id');
            $table->foreign('categoria_articulos_id')->references('id')->on('categoria_articulos');

            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
