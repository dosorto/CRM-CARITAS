<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class KPI extends BaseModel
{
    protected $table = 'kpis';

    public function kpisEncuestas(): HasMany
    {
        return $this->hasMany(KPIEncuesta::class, 'id_kpi');
    }

    public function preguntas(): HasMany
    {
        return $this->hasMany(Pregunta::class, 'id_kpi');
    }
}
