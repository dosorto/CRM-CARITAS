<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobiliario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'mobiliarios';

    public function subcategoria(): BelongsTo
    {
        return $this->belongsTo(SubCategoria::class); // Relación con subcategoría
    }
}
