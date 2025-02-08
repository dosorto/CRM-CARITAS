<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DonacionArticulo extends BaseModel
{
    protected $table = 'donacion_articulo';
    
    protected $fillable = [
        'id_donacion', 
        'id_articulo', 
        'cantidad_donada'
    ];


    public function donacion(): BelongsTo
    {
        return $this->belongsTo(Donacion::class, 'id_donacion');
    }

    public function articulo(): BelongsTo
    {
        return $this->belongsTo(Articulo::class, 'id_articulo');
    }
}

