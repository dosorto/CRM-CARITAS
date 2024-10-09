<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'apellido',
        'identidad',
        'fecha_nacimiento',
        'estado_civil',
        'telefono',
        'departamento_id'
    ] ;
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

}
