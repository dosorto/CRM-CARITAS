<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Falta extends BaseModel
{
    protected $table = 'faltas';

    public function gravedadFalta(): BelongsTo
    {
        return $this->belongsTo(GravedadFalta::class, 'gravedad_falta_id');
    }
}
