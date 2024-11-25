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
        Schema::create('migrantes', function (Blueprint $table) {
            $table->id();

            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido')->nullable();
            $table->string('segundo_apellido')->nullable();

            $table->string('sexo');
            $table->string('tipo_identificacion')->nullable();
            $table->string('numero_identificacion', length: 20)->unique()->nullable();

            $table->unsignedBigInteger('pais_id')->nullable();
            $table->foreign('pais_id')->references('id')->on('paises');

            $table->string('estado_civil');
            $table->unsignedInteger('codigo_familiar')->nullable();
            $table->boolean('es_lgbt');
            $table->date('fecha_nacimiento')->nullable();

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
        Schema::dropIfExists('migrantes');
    }
};
