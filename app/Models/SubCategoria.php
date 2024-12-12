<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategoria extends BaseModel
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'subcategorias';

    public function categoria()
    {
        //return $this->belongsTo(Categoria::class); // Relación con categorías
        return $this->belongsTo(Categoria::class);
    }

    public function mobiliarios(): HasMany
    {
        return $this->hasMany(Mobiliario::class); // Relación con artículos
    }
}
