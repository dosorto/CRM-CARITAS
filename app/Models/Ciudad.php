<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciudad extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'ciudades';

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class);
    }
}

