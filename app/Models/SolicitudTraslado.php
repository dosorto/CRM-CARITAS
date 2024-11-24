<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SolicitudTraslado extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'solicitudes_traslado';

    protected $casts = [
        'fecha_solicitud' => 'datetime',
    ];
    

    public function solicitante(): BelongsTo
    {
        return $this->belongsTo(User::class, 'solicitante_id', 'id');
    }

    public function aprobador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'aprobador_id', 'id');
    }

    public function mobiliarios(): BelongsToMany
    {
        return $this->belongsToMany(
            Mobiliario::class,           // Modelo relacionado
            'detalles_solicitud_traslado', // Tabla intermedia
            'solicitud_traslado_id',    // Clave foránea en la tabla intermedia que apunta a solicitudes_traslado
            'mobiliario_id'             // Clave foránea en la tabla intermedia que apunta a mobiliarios
        );
    }
}