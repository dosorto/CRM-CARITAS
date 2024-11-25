<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleSolicitudTraslado extends BaseModel
{
    use SoftDeletes;

    protected $table = "detalles_solicitud_traslado";

    protected $fillable = [
        'solicitud_traslado_id',
        'mobiliario_id',
    ];

    public function solicitud_traslado(): BelongsTo
    {
        return $this->belongsTo(SolicitudTraslado::class);
    }

    public function mobiliario(): BelongsTo
    {
        return $this->belongsTo(Mobiliario::class, 'mobiliario_id');
    }
}
