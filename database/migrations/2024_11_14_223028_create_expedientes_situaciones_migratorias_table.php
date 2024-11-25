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
        Schema::create('expedientes_situaciones_migratorias', function (Blueprint $table) {
            $table->unsignedBigInteger('expediente_id');
            $table->unsignedBigInteger('situacion_migratoria_id');

            $table->primary(['expediente_id', 'situacion_migratoria_id']);

            // Definir nombres cortos para las llaves foráneas
            $table->foreign('expediente_id', 'fk_exp_sit_exp')
                ->references('id')
                ->on('expedientes')
                ->onDelete('cascade');

            $table->foreign('situacion_migratoria_id', 'fk_exp_sit_mig')
                ->references('id')
                ->on('situaciones_migratorias')
                ->onDelete('cascade');

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
        Schema::dropIfExists('expedientes_situaciones_migratorias');
    }
};
