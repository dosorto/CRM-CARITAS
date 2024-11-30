<?php

namespace App\Livewire\Crud\Migrantes\SalidaMigrante;

use App\Models\Expediente;
use App\Services\MigranteService;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use Ramsey\Uuid\Type\Integer;

#[Lazy()]
class RegistrarSalidaMigrante extends Component
{

    public $preguntas = [
        'atencionPsicologica' => '¿Recibió atención psicológica?',
        'asesoriaPsicologica' => '¿Recibió asesoría psicológica?',
        'atencionLegal' => '¿Recibió atención legal?',
        'asesoriaPsicosocial' => '¿Recibió asesoría psicosocial?',
    ];

    public $nombre;
    public $identificacion;
    public $pais;
    public $edad;
    public $fechaIngreso;
    public $dias;

    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public function mount()
    {
        // validar el id de la sesion
        if (session()->has('migranteId')) {
            $id = session('migranteId');
        } else {
            return redirect(route('ver-migrantes'));
        }


        $migrante = $this->getMigranteService()->buscar('id', intval($id));

        if (!$migrante) {
            session()->forget('migranteId');
            return redirect(route('ver-migrantes'));
        }


        $this->nombre = $migrante->primer_nombre . ' ' .
            $migrante->segundo_nombre . ' ' .
            $migrante->primer_apellido . ' ' .
            $migrante->segundo_apellido;

        $this->identificacion = $migrante->numero_identificacion;
        $this->pais = $migrante->pais->nombre_pais;
        $this->edad = $this->calcularEdad($migrante->fecha_nacimiento);
        $this->fechaIngreso = Expediente::select('created_at')
            ->orderBy('id', 'desc')
            ->where('migrante_id', $migrante->id)
            ->first();

        if (!$this->fechaIngreso) {
            // No se contró el expediente
            return redirect(route('ver-migrantes'));
        }
    }

    public function render()
    {
        return view('livewire.crud.migrantes.salida-migrante.registrar-salida-migrante');
    }

    public function calcularEdad($fechaNacimiento)
    {
        // Asegúrate de que la fecha de nacimiento esté bien parseada
        $fecha = Carbon::parse($fechaNacimiento);
        // Calcula la edad en años
        return $fecha->age;
    }

    public function getMigranteService()
    {
        return app(MigranteService::class);
    }
}
