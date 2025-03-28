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
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_kpi');
            $table->foreign('id_kpi')->references('id')->on('kpis')->onDelete('cascade');

            $table->string('pregunta')->unique();
            $table->string('idioma');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas');
    }
};
