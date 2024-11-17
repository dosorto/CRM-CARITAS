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
        Schema::create('expedientes_necesidades', function (Blueprint $table) {
            $table->unsignedBigInteger('expediente_id');
            $table->unsignedBigInteger('necesidad_id');

            $table->primary(['expediente_id', 'necesidad_id']);

            $table->foreign('expediente_id')->references('id')->on('expedientes')->onDelete('cascade');
            $table->foreign('necesidad_id')->references('id')->on('necesidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes_necesidades');
    }
};
