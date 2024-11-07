<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MotivoSalidaPais extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'motivos_salida_pais';
}