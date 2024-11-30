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
        Schema::create('expedientes_motivos_salida_pais', function (Blueprint $table) {
            $table->unsignedBigInteger('expediente_id');
            $table->unsignedBigInteger('motivo_salida_pais_id');

            $table->primary(['expediente_id', 'motivo_salida_pais_id']);

            $table->foreign('expediente_id')->references('id')->on('expedientes');
            $table->foreign('motivo_salida_pais_id')->references('id')->on('motivos_salida_pais');
            
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes_motivos_salida_pais');
    }
};
