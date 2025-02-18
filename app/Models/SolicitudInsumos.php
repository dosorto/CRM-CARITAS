<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SolicitudInsumos extends BaseModel
{
    use SoftDeletes;

    protected $table = 'solicitudes_insumos';

    protected $fillable = ['firmado', 'user_id', 'created_by', 'updated_by', 'deleted_by'];

    public function detalles_solicitud_insumos(): HasMany
    {
        return $this->hasMany(DetalleSolicitudInsumos::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }   
}
