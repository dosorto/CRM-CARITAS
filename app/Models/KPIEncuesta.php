<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KPIEncuesta extends Model
{
    protected $table = 'kpis_encuestas';

    public function encuesta(): BelongsTo
    {
        return $this->belongsTo(Encuesta::class, 'id_encuesta');
    }

    public function kpi(): BelongsTo
    {
        return $this->belongsTo(KPI::class, 'id_kpi');
    }
}
