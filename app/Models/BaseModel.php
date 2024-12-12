<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class BaseModel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'created_by',
        'deleted_by',
        'updated_by',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->created_by && Auth::check()) {
                $model->created_by = Auth::id();
            }
        });

        static::deleting(function ($model) {
            if (!$model->deleted_by && Auth::check()) {
                $model->deleted_by = Auth::id();
                $model->save();
            }
        });

        static::updating(function ($model) {
            if (!$model->updated_by && Auth::check()) {
                $model->updated_by = Auth::id();
                $model->save();
            }
        });
    }
}

