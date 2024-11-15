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
        Schema::create('donantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_donante', 255);
            $table->unsignedBigInteger('tipo_donante_id');
            $table->foreign('tipo_donante_id')->references('id')->on('tipo_donante')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
         });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donantes');
    }
};
