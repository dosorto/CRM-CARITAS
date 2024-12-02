<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\ActaEntrega;
use App\Models\Expediente;
use App\Models\Migrante;
use App\Services\MigranteService;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class HistorialMigrante extends Component
{
    public $expedientes = [];
    public $actasEntrega = [];
    public $migrante;

    public function mount($migranteId)
    {
        $this->expedientes = Expediente::where('migrante_id', $migranteId)->get();
        $this->actasEntrega = ActaEntrega::where('migrante_id', $migranteId)->get();
        $this->migrante= Migrante::find($migranteId);
    }

    public function getMigranteService()
    {
        return app(MigranteService::class);
    }

    public function render()
    {
        return view('livewire.crud.migrantes.historial-migrante');
    }






    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }
}
