<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonacionArticulo extends Model
{
   

    // Especificar la tabla que usará el modelo
    protected $table = 'donacion_articulo';

    // Especificar los atributos que se pueden asignar masivamente
    protected $fillable = [
        'id_donacion', 
        'id_articulo', 
        'cantidad_donada'
    ];

    // Definir las relaciones
    public function donacion()
    {
        return $this->belongsTo(Donacion::class, 'id_donacion');
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'id_articulo');
    }
}
