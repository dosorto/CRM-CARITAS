<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AsesorMigratorio extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'asesores_migratorios';

    public function expedientes(): HasMany
    {
        return $this->hasMany(Expediente::class, 'asesor_migratorio_id');
    }
}
