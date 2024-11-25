<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Necesidad extends BaseModel
{
    use SoftDeletes, HasFactory;

    protected $table = 'necesidades';
}
