<?php

namespace App\Services;

use App\Models\Migrante;

class FaltaService
{
    public function asignarFaltas($migranteId, $faltas)
    {
        $migrante = Migrante::find($migranteId);
        $migrante->faltas()->attach($faltas);
    }
}
