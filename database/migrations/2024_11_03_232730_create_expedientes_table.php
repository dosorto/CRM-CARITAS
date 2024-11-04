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
            $table->string('discapacidades')->nullable();
            $table->string('necesidades')->nullable();
            $table->string('frontera')->nullable();
            $table->string('situaciones_migratorias')->nullable();
            $table->string('observacion')->nullable();
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
