<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Frontera extends BaseModel
{
    use SoftDeletes, HasFactory;

    protected $table = 'fronteras';

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function expedientes(): HasMany
    {
        return $this->hasMany(Expediente::class, 'frontera_id');
    }
}

