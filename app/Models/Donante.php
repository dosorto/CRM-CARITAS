<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donante extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'donantes';

    protected $fillable = [
        'nombre_donante',
        'tipo_donante_id',
    ];

    public function tipoDonante()
    {
        return $this->belongsTo(TipoDonante::class, 'tipo_donante_id');
    }

    public function donaciones()
    {
        return $this->hasMany(Donacion::class, 'id_donante');
    }
}
