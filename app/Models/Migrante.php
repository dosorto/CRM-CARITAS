<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Migrante extends Model
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
}
