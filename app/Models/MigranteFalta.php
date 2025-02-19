<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MigranteFalta extends BaseModel
{
    protected $table = 'migrantes_faltas';

    public function migrante(): BelongsTo
    {
        return $this->belongsTo(Migrante::class, 'migrante_id');
    }

    public function falta(): BelongsTo
    {
        return $this->belongsTo(Falta::class, 'falta_id');
    }
}
