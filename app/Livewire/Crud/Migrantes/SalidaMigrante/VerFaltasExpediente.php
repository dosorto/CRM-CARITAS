<?php

namespace App\Livewire\Crud\Migrantes\SalidaMigrante;

use App\Models\Falta;
use Livewire\Component;

class VerFaltasExpediente extends Component
{
    public $faltas;
    public $botonGrande;

    public function mount($migranteId, $botonGrande = false)
    {
        $this->botonGrande = $botonGrande;

        // Obtener las faltas asociadas al expediente
        $faltasAgrupadas = Falta::whereHas('migrantes', function ($query) use ($migranteId) {
            $query->where('migrante_id', $migranteId);
        })
            ->with('gravedad') // Carga la relación de la gravedad
            ->get()
            ->groupBy(function ($falta) {
                return $falta->gravedad->gravedad_falta; // Agrupa por el nombre de la gravedad
            });

        // Convertir el resultado a un array asociativo
        $this->faltas = $faltasAgrupadas->mapWithKeys(function ($items, $key) {
            return [$key => $items->pluck('falta')->toArray()]; // Extrae solo los nombres de las faltas
        })->toArray();
    }


    public function render()
    {
        return view('livewire.crud.migrantes.salida-migrante.ver-faltas-expediente');
    }
}
