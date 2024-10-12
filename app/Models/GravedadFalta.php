<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class GravedadFalta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'gravedad_faltas';

    public function faltasDisciplinarias(): HasMany
    {
        return $this->hasMany(FaltaDisciplinaria::class);
    }

}
