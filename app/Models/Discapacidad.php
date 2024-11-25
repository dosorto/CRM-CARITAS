<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discapacidad extends BaseModel
{
    use SoftDeletes, HasFactory;

    protected $table = 'discapacidades';
}
