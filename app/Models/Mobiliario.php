<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mobiliario extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'mobiliarios';

    public function subcategoria(): BelongsTo
    {
        return $this->belongsTo(SubCategoria::class); // Relación con subcategoría
    }
    
    public function solicitudesTraslado(): BelongsToMany
    {
        return $this->belongsToMany(
            SolicitudTraslado::class,   // Modelo relacionado
            'detalles_solicitud_traslado', // Tabla intermedia
            'mobiliario_id',           // Clave foránea en la tabla intermedia que apunta a mobiliarios
            'solicitud_traslado_id'    // Clave foránea en la tabla intermedia que apunta a solicitudes_traslado
        );
    }

}
