<?php

namespace App\Livewire\Crud\Migrantes\SalidaMigrante;

use App\Models\Falta;
use App\Models\Migrante;
use App\Models\MigranteFalta;
use Livewire\Attributes\On;
use Livewire\Component;

class VerFaltasExpediente extends Component
{
    public $faltas;
    public $faltasSelected = [];
    public $nombre;
    public $identidad;
    public $faltasMigrante;
    public $migrante;

    public $modalTitle = "Resumen de Conducta";

    public $pantallaAsignar = false;

    public $textoBusquedaFaltas = '';

    public function mount($migranteId)
    {
        $this->migrante = Migrante::find($migranteId);

        $this->nombre = $this->migrante->primer_nombre . ' ' .
            $this->migrante->segundo_nombre . ' ' .
            $this->migrante->primer_apellido . ' ' .
            $this->migrante->segundo_apellido;

        $this->identidad = $this->migrante->numero_identificacion;

        $this->actualizarFaltasMigrante();

        $this->actualizarFaltas();
    }


    public function switchPantallaAsignar()
    {
        $this->pantallaAsignar = !$this->pantallaAsignar;
        $this->faltasSelected = [];
        $this->resetErrorBag();

        if ($this->pantallaAsignar) {
            $this->modalTitle = "Asignar Faltas Disciplinarias";
        } else {
            $this->modalTitle = "Resumen de Conducta";
        }
    }


    public function updatedTextoBusquedaFaltas($value)
    {
        $query = Falta::orderBy('gravedad_falta_id');

        if (trim($value) !== '') {
            $query->where('falta', 'LIKE', '%' . trim($value) . '%');
        }

        $this->faltas = $query->get();
    }

    public function asignarFaltas()
    {
        $this->validate([
            'faltasSelected' => 'array|min:1',
        ]);

        $datos = [];

        foreach ($this->faltasSelected as $falta_id) {

            $migranteFalta = new MigranteFalta;
            $migranteFalta->migrante_id = $this->migrante->id;
            $migranteFalta->falta_id = $falta_id;
            $migranteFalta->save();

            // $datos[$falta_id] = ['created_at' => now(), 'updated_at' => now()];
        }
        $this->migrante->faltas()->attach($datos);
        $this->switchPantallaAsignar();
        $this->actualizarFaltasMigrante();
    }

    public function render()
    {
        return view('livewire.crud.migrantes.salida-migrante.ver-faltas-expediente');
    }

    #[On('falta-asignada')]
    public function faltaAsignada() {}


    #[On('falta-created')]
    public function actualizarFaltas()
    {
        $this->faltas = Falta::orderBy('gravedad_falta_id')->get();
    }

    public function actualizarFaltasMigrante()
    {
        $this->faltasMigrante = MigranteFalta::where('migrante_id', $this->migrante->id)->get()->sortBy('falta.gravedad_falta_id');
    }

    public function eliminarFalta($faltaMigranteId)
    {
        $falta = MigranteFalta::find($faltaMigranteId);
        $falta->delete();

        $this->actualizarFaltasMigrante();

        $this->dispatch('')->self();
    }
}
