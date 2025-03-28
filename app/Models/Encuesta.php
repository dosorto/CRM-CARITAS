<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Encuesta extends BaseModel
{
    protected $table = 'encuestas';

    public function resultados(): HasMany
    {
        return $this->hasMany(KPIEncuesta::class, 'id_encuesta');
    }
}
