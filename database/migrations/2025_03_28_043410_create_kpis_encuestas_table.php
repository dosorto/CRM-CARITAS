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
        Schema::create('kpis_encuestas', function (Blueprint $table) {
            $table->id();
            $table->decimal('respuesta');

            $table->unsignedBigInteger('id_kpi')->unique();
            $table->foreign('id_kpi')->references('id')->on('kpis')->onDelete('cascade');

            $table->unsignedBigInteger('id_encuesta')->unique();
            $table->foreign('id_encuesta')->references('id')->on('encuestas')->onDelete('cascade');

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
        Schema::dropIfExists('kpis_encuestas');
    }
};
