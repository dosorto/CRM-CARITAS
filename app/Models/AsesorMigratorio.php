<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AsesorMigratorio extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'asesores_migratorios';
}
