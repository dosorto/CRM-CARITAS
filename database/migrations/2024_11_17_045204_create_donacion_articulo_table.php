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
        Schema::create('donacion_articulo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_donacion');  
            $table->unsignedBigInteger('id_articulo');  
            $table->integer('cantidad_donada');  
           
            $table->foreign('id_donacion')->references('id')->on('donaciones')->onDelete('cascade');
            $table->foreign('id_articulo')->references('id')->on('articulos')->onDelete('cascade');

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
        Schema::dropIfExists('donacion_articulo');
    }
};
