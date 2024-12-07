<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SolicitudTraslado extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'solicitudes_traslado';

    protected $fillable = ['firmado', 'solicitante_id', 'aprobador_id', 'created_by', 'updated_by', 'deleted_by'];

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
