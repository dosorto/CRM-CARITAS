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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('migrante_id')->nullable();
            $table->foreign('migrante_id')->references('id')->on('migrantes');

            $table->unsignedBigInteger('frontera_id')->nullable();
            $table->foreign('frontera_id')->references('id')->on('fronteras');

            $table->unsignedBigInteger('asesor_migratorio_id')->nullable();
            $table->foreign('asesor_migratorio_id')->references('id')->on('asesores_migratorios');

            $table->unsignedBigInteger('situacion_migratoria_id')->nullable();
            $table->foreign('situacion_migratoria_id')->references('id')->on('situaciones_migratorias');

            $table->string('observacion')->nullable();
            $table->date('fecha_ingreso')->nullable();

            $table->boolean('fallecimiento')->default(false);


            // Datos de salida
            $table->date('fecha_salida')->nullable();
            $table->boolean('atencion_psicologica')->nullable();
            $table->boolean('asesoria_psicologica')->nullable();
            $table->boolean('atencion_legal')->nullable();
            $table->boolean('asesoria_psicosocial')->nullable();


            $table->integer("created_by");
            $table->integer("deleted_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
