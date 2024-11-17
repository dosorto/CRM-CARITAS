<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'donaciones';

    protected $fillable = [
        'id_donante',
        'id_articulo',
        'cantidad_donacion',
        'fecha_donacion',
    ];

    public function donante()
    {
        return $this->belongsTo(Donante::class, 'id_donante');
    }

    public function articulos()
    {
        return $this->belongsToMany(Articulo::class, 'donacion_articulo', 'id_donacion', 'id_articulo')
                    ->withPivot('cantidad_donada') // Incluye columnas adicionales
                    ->withTimestamps();
    }

    
    
}
