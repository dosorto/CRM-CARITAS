<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActaEntrega extends BaseModel
{
    use SoftDeletes;

    protected $table = "actas_entrega";

    public function detalles_acta_entrega(): HasMany
    {
        return $this->hasMany(DetalleActaEntrega::class);
    }

    // En el modelo ActaEntrega
    public function migrante(): BelongsTo
    {
        return $this->belongsTo(Migrante::class, 'migrante_id');
    }   
}
