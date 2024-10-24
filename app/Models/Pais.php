<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pais extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'paises';

    public function departamentos(): HasMany
    {
        return $this->hasMany(Departamento::class);
    }
}
