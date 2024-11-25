<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleSolicitudInsumos extends BaseModel
{
    use SoftDeletes;

    protected $table = "detalles_solicitud_insumos";

    public function solicitud_insumos(): BelongsTo
    {
        return $this->belongsTo(SolicitudInsumos::class);
    }

    public function articulo(): BelongsTo
    {
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }
}