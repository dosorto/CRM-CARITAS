<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class GravedadFalta extends BaseModel
{
    protected $table = 'gravedades_faltas';

    public function faltas(): HasMany
    {
        return $this->hasMany(Falta::class, 'gravedad_falta_id');
    }
}
