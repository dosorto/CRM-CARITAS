<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CupoEncuesta extends Model
{
    protected $table = 'cupos_encuesta';

    protected $fillable = ['disponibles'];

    public static function disponibles(): int
    {
        $registro = static::first();
        return $registro ? $registro->disponibles : 0;
    }

    public static function establecer(int $cantidad): int
    {
        DB::transaction(function () use ($cantidad) {
            $registro = static::lockForUpdate()->first();
            if ($registro) {
                $registro->update(['disponibles' => $cantidad]);
            }
        });

        return static::disponibles();
    }

    public static function incrementar(int $cantidad = 1): int
    {
        DB::transaction(function () use ($cantidad) {
            $registro = static::lockForUpdate()->first();
            if ($registro) {
                $registro->increment('disponibles', $cantidad);
            }
        });

        return static::disponibles();
    }

    public static function restar(int $cantidad = 1): bool
    {
        return DB::transaction(function () use ($cantidad) {
            $registro = static::lockForUpdate()->first();
            if ($registro && $registro->disponibles >= $cantidad) {
                $registro->decrement('disponibles', $cantidad);
                return true;
            }
            return false;
        });
    }
}
