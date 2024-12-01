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

            $table->boolean('fallecimiento')->default(false);

            $table->date('fecha_salida')->default(null);

            $table->string('observacion')->nullable();
            
            $table->boolean('atencion_psicologica')->default(0);
            $table->boolean('asesoria_psicologica')->default(0);
            $table->boolean('atencion_legal')->default(0);
            $table->boolean('asesoria_psicosocial')->default(0);


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
