<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = "articulos";

    public function categoriaArticulo(): BelongsTo
    {
        return $this->belongsTo(CategoriaArticulo::class, 'categoria_articulos_id');
    }
}
