<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pregunta extends BaseModel
{
    protected $table = 'preguntas';

    public function kpi(): BelongsTo
    {
        return $this->belongsTo(KPI::class, 'id_kpi');
    }
}
