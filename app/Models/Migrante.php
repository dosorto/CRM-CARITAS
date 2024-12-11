<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Migrante extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'migrantes';
    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'sexo',
        'estado_civil',
        'es_lgbt',
        'fecha_nacimiento',
    ];

    public function pais(): BelongsTo
    {
        return $this->belongsTo(Pais::class);
    }

    public function expedientes(): HasMany
    {
        return $this->hasMany(Expediente::class, 'migrante_id');
    }

    public function faltas(): BelongsToMany
    {
        return $this->belongsToMany(Falta::class, 'migrantes_faltas', 'migrante_id', 'falta_id');
    }
}
