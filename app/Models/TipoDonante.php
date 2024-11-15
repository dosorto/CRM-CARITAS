<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoDonante extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tipo_donante';

    protected $fillable = [
        'descripcion',
    ];

    public function donantes()
    {
        return $this->hasMany(Donante::class, 'tipo_donante_id');
    }
}
