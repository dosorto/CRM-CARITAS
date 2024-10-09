<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\SoftDeletes;

class FaltaDisciplinaria extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'faltas_disciplinarias';

    public function gravedadFalta(): BelongsTo
    {
        return $this->belongsTo(GravedadFalta::class);
    }
}
