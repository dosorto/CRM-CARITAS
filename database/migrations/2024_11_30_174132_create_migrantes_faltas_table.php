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
        Schema::create('migrantes_faltas', function (Blueprint $table) {
            $table->id(); // Autoincremental para permitir duplicados
            $table->unsignedBigInteger('migrante_id');
            $table->unsignedBigInteger('falta_id');

            $table->foreign('migrante_id')->references('id')->on('migrantes')->onDelete('cascade');
            $table->foreign('falta_id')->references('id')->on('faltas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('migrantes_faltas');
    }
};
