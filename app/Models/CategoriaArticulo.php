<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaArticulo extends Model
{

    use HasFactory, SoftDeletes;

    protected $table = 'categoria_articulos';

    public function articulos(): HasMany
    {
        return $this->hasMany(Articulo::class); // Relación con artículos
    }
}
