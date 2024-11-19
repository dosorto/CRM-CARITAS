<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SituacionMigratoria extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'situaciones_migratorias';

    public function expedientes(): HasMany
    {
        return $this->hasMany(Expediente::class, 'situacion_migratoria_id');
    }
}
