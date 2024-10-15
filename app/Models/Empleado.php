<?php

namespace App\Models;

use App\Livewire\Usuarios\Usuarios;
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
        'departamento_id',

    ] ;

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }
    public function usuario()   {
        return $this->hasOne(User::class, 'empleado_id');
    }

}
