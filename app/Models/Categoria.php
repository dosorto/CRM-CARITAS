<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categorias';

    public function subcategorias(): HasMany
    {
        return $this->hasMany(SubCategoria::class); // Relación con subcategorías
    }
}