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
        Schema::create('detalles_solicitud_traslado', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('solicitud_traslado_id');
            $table->foreign('solicitud_traslado_id')->references('id')->on('solicitudes_traslado');

            $table->unsignedBigInteger('mobiliario_id');
            $table->foreign('mobiliario_id')->references('id')->on('mobiliarios');

            
            $table->integer("created_by");
            $table->integer("deleted_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_solicitud_traslado');
    }
};
