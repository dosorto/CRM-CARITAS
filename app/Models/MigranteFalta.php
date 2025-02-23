<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MigranteFalta extends BaseModel
{
    use SoftDeletes, HasFactory;

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
