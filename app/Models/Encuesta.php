<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Encuesta extends Model
{
    protected $table = 'encuestas';

    public function resultados(): HasMany
    {
        return $this->hasMany(KPIEncuesta::class, 'id_encuesta');
    }
}
