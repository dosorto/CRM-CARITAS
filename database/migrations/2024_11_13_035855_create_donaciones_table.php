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
        Schema::create('donaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_donante');
            $table->date('fecha_donacion');
            $table->foreign('id_donante')->references('id')->on('donantes')->onDelete('cascade');
            $table->timestamps();
               
            $table->softDeletes('deleted_at', precision: 0);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donaciones');
    }
};
