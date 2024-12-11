<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Falta extends BaseModel
{
    protected $table = 'faltas';

    public function gravedad(): BelongsTo
    {
        return $this->belongsTo(GravedadFalta::class, 'gravedad_falta_id');
    }

    public function migrantes()
    {
        return $this->belongsToMany(Migrante::class, 'migrantes_faltas', 'falta_id', 'migrante_id');
    }
}
