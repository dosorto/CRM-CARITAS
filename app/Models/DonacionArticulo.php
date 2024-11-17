<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonacionArticulo extends Model
{
   

    protected $table = 'donacion_articulo';

    
    protected $fillable = [
        'id_donacion', 
        'id_articulo', 
        'cantidad_donada'
    ];


    public function donacion()
    {
        return $this->belongsTo(Donacion::class, 'id_donacion');
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'id_articulo');
    }
}
