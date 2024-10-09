<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Ciudad;


class Departamento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'departamentos';

    public function pais(): BelongsTo
    {
        return $this->belongsTo(Pais::class);
    }

    public function ciudades(): HasMany
    {
        return $this->hasMany(Ciudad::class);
    }

    /*aqui toque para hacer relacion pido perdon :(  att. Ingrid xd  */

    public function empleado()
    {
        return $this->hasMany(Departamento::class, 'departamento_id');
    }

}
