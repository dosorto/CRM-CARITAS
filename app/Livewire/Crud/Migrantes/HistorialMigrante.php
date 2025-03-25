<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Expediente;
use App\Models\Migrante;
use App\Services\MigranteService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy()]
class HistorialMigrante extends Component
{
    public $expediente;
    public $migrante;

    public $preguntas = [
        'atencionPsicologica' => '¿Recibió atención psicológica?',
        'asesoriaPsicologica' => '¿Recibió asesoría psicológica?',
        'atencionLegal' => '¿Recibió atención legal?',
        'asesoriaPsicosocial' => '¿Recibió asesoría psicosocial?',
    ];

    public $atencionPsicologica = 0;
    public $asesoriaPsicologica = 0;
    public $atencionLegal = 0;
    public $asesoriaPsicosocial = 0;

    public $necesidades;
    public $motivos;
    public $discapacidades;


    public function mount($migranteId)
    {
        $this->migrante = Migrante::find($migranteId);
        $this->expediente = Expediente::where('migrante_id', $migranteId)->first();

        if ($this->expediente) {
            $this->atencionPsicologica = $this->expediente->atencion_psicologica;
            $this->asesoriaPsicologica = $this->expediente->asesoria_psicologica;
            $this->atencionLegal = $this->expediente->atencion_legal;
            $this->asesoriaPsicosocial = $this->expediente->asesoria_psicosocial;

            $this->necesidades = $this->expediente->necesidades->pluck('necesidad')->join(', ');
            $this->motivos = $this->expediente->motivosSalidaPais->pluck('motivo_salida_pais')->join(', ');
            $this->discapacidades = $this->expediente->discapacidades->pluck('discapacidad')->join(', ');
        }

        // dd(Hash::check('123', Auth::user()->password), Auth::user()->password);
    }

    public function updatedAtencionPsicologica()
    {
        $this->expediente->atencion_psicologica = $this->atencionPsicologica;
        $this->expediente->save();
    }

    public function updatedAsesoriaPsicologica()
    {
        $this->expediente->asesoria_psicologica = $this->asesoriaPsicologica;
        $this->expediente->save();
    }

    public function updatedAtencionLegal()
    {
        $this->expediente->atencion_legal = $this->atencionLegal;
        $this->expediente->save();
    }

    public function updatedAsesoriaPsicosocial()
    {
        $this->expediente->asesoria_psicosocial = $this->asesoriaPsicosocial;
        $this->expediente->save();
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
