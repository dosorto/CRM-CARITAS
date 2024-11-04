<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleActaEntrega extends Model
{
    use SoftDeletes;

    protected $table = "detalles_acta_entrega";

    public function acta_entrega(): BelongsTo
    {
        return $this->belongsTo(ActaEntrega::class);
    }

    public function articulo(): BelongsTo
    {
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }
}
