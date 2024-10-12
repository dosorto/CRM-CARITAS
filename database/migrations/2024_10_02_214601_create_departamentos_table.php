<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_departamento', length: 50);

            $table->string('codigo_departamento', length: 5);
            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id')->references('id')->on('paises');
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('departamentos');
    }
};
