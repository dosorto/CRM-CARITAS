<?php

namespace App\Livewire\Crud\Migrantes\SalidaMigrante;

use App\Models\Expediente;
use App\Models\Falta;
use Livewire\Attributes\On;
use Livewire\Component;

class VerFaltasExpediente extends Component
{
    public $faltas;
    public $nombre;
    public $identidad;
    public $faltasMigrante;
    public $migranteId;

    public function mount($migranteId)
    {
        // obtener ultimo expediente
        $expediente = Expediente::where('migrante_id', $migranteId)
            ->orderBy('id', 'desc')
            ->first();

        $migrante = $expediente->migrante;
        $this->migranteId = $migrante->id;

        $this->faltas = $expediente->faltas;

        $this->nombre = $migrante->primer_nombre . ' ' .
            $migrante->segundo_nombre . ' ' .
            $migrante->primer_apellido . ' ' .
            $migrante->segundo_apellido;

        $this->identidad = $migrante->numero_identificacion;

        $this->faltasMigrante = $migrante->faltas;


        // // Obtener las faltas asociadas al expediente
        // $faltasAgrupadas = Falta::whereHas('expedientes', function ($query) use ($expedienteId) {
        //     $query->where('expediente_id', $expedienteId);
        // })
        //     ->with('gravedad') // Carga la relación de la gravedad
        //     ->get()
        //     ->groupBy(function ($falta) {
        //         return $falta->gravedad->gravedad_falta; // Agrupa por el nombre de la gravedad
        //     });

        // // Convertir el resultado a un array asociativo
        // $this->faltas = $faltasAgrupadas->mapWithKeys(function ($items, $key) {
        //     return [$key => $items->pluck('falta')->toArray()]; // Extrae solo los nombres de las faltas
        // })->toArray();

        // dd($this->faltas);
    }


    public function render()
    {
        return view('livewire.crud.migrantes.salida-migrante.ver-faltas-expediente');
    }

    #[On('falta-asignada')]
    public function faltaAsignada()
    {
    }
}
