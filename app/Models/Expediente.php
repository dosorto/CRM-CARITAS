<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expediente extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'expedientes';

    public function discapacidades(): BelongsToMany
    {
        return $this->belongsToMany(
            Discapacidad::class,
            'expedientes_discapacidades',
            'expediente_id',
            'discapacidad_id'
        );
    }

    public function motivosSalidaPais(): BelongsToMany
    {
        return $this->belongsToMany(
            MotivoSalidaPais::class,
            'expedientes_motivos_salida_pais',
            'expediente_id',               // Foreign key en la tabla pivote hacia este modelo (Expediente)
            'motivo_salida_pais_id'
        );
    }

    public function necesidades(): BelongsToMany
    {
        return $this->belongsToMany(
            Necesidad::class,
            'expedientes_necesidades',
            'expediente_id',               // Foreign key en la tabla pivote hacia este modelo (Expediente)
            'necesidad_id'
        );
    }

    // public function situaciones_migratorias(): BelongsToMany
    // {
    //     return $this->belongsToMany(
    //         SituacionMigratoria::class,
    //         'expedientes_situaciones_migratorias',
    //         'expediente_id',               // Foreign key en la tabla pivote hacia este modelo (Expediente)
    //         'situacion_migratoria_id'
    //     );
    // }
}
