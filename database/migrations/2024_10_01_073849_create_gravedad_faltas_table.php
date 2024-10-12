<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
      public function up(): void
    {
        Schema::create('gravedad_faltas', function (Blueprint $table) {
            $table->id();
            $table->string('gravedad_falta', length:30);
            $table->unsignedSmallInteger('nivel_gravedad');
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gravedad_faltas');
    }
};
