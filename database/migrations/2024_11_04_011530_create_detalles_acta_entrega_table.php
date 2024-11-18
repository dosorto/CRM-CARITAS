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
        Schema::create('detalles_acta_entrega', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('acta_entrega_id');
            $table->foreign('acta_entrega_id')->references('id')->on('actas_entrega');

            $table->unsignedBigInteger('articulo_id');
            $table->foreign('articulo_id')->references('id')->on('articulos');

            $table->unsignedMediumInteger('cantidad');

            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_acta_entrega');
    }
};
