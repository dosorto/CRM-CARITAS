<?php

namespace App\Livewire\Crud\Migrantes;

use App\Livewire\Crud\Migrantes\SalidaMigrante\VerFaltasExpediente;
use App\Models\Falta;
use App\Models\Migrante;
use App\Services\MigranteService;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AsignarFaltaModal extends Component
{
    public $faltas;
    public $faltaId;
    public $gravedad;
    public $migranteId;
    public $nombre;

    public function mount($migranteId)
    {
        $this->faltas = Falta::select('id', 'falta')
            ->with('gravedad')
            ->get();

        $this->faltaId = 1;
        $this->gravedad = Falta::where('id', 1)->first()->gravedad->gravedad_falta;

        $this->migranteId = $migranteId;
        $migrante = $this->getMigranteService()->buscar('id', $migranteId);
        $this->nombre = $migrante->primer_nombre . ' ' . $migrante->primer_apellido;
    }

    public function render()
    {
        return view('livewire.crud.migrantes.asignar-falta-modal');
    }

    public function updatedFaltaId($value)
    {
        $this->gravedad = Falta::where('id', $value)->first()->gravedad->gravedad_falta;
    }

    public function asignar()
    {
        try {
            DB::table('migrantes_faltas')->insert([
                'migrante_id' => $this->migranteId,
                'falta_id' => $this->faltaId,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $this->dispatch('close-modal')->self();
            $this->dispatch('falta-asignada')->to(VerFaltasExpediente::class);
        } catch (Exception $e) {
            $this->addError('faltaId', 'Esta falta ya fue asignada al migrante');
        }
    }

    public function getMigranteService()
    {
        return app(MigranteService::class);
    }
}
