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
        Schema::create('faltas_disciplinarias', function (Blueprint $table) {
            $table->id();
            $table->string('falta_disciplinaria', length: 100)->unique();

            $table->unsignedBigInteger('gravedad_falta_id');
            $table->foreign('gravedad_falta_id')->references('id')->on('gravedad_faltas');
            
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faltas_disciplinarias');
    }
};
