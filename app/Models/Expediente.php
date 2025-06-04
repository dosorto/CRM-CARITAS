<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expediente extends BaseModel
{
    use SoftDeletes, HasFactory;

    protected $table = 'expedientes';
    protected $casts = [
        'fecha_ingreso' => 'date',
        'fecha_salida' => 'date',
    ];

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

    public function frontera(): BelongsTo
    {
        return $this->belongsTo(Frontera::class, 'frontera_id');
    }

    public function asesorMigratorio(): BelongsTo
    {
        return $this->belongsTo(AsesorMigratorio::class, 'asesor_migratorio_id');
    }

    public function situacionMigratoria(): BelongsTo
    {
        return $this->belongsTo(SituacionMigratoria::class, 'situacion_migratoria_id');
    }

    public function migrante(): BelongsTo
    {
        return $this->belongsTo(Migrante::class, 'migrante_id');
    }
}
