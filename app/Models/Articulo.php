<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'articulos';

    public function subcategoria()
    {
        return $this->belongsTo(SubCategoria::class); // Relación con subcategoría
    }


}
