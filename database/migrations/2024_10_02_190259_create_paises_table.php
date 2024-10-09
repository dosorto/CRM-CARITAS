<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('paises', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_pais', length: 50);
            $table->string('codigo_alfa3', length: 3);
            $table->string('codigo_numerico', length: 3);
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paises');
    }
};
