<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SolicitudInsumos extends Model
{
    use SoftDeletes;

    protected $table = 'solicitudes_insumos';

    public function detalles_solicitud_insumos(): HasMany
    {
        return $this->hasMany(DetalleSolicitudInsumos::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }   
}