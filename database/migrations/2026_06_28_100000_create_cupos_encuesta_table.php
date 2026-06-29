<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cupos_encuesta', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('disponibles')->default(0);
            $table->timestamps();
        });

        DB::table('cupos_encuesta')->insert([
            'disponibles' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('cupos_encuesta');
    }
};
