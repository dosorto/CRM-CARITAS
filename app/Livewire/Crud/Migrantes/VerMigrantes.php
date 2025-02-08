<?php

namespace App\Livewire\Crud\Migrantes;

use App\Services\MigranteService;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Lazy()]
class VerMigrantes extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    public $fakeColNames = [
        'Número de Identificación' => 'numero_identificacion',
        'Primer Nombre' => 'primer_nombre',
        'Segundo Nombre' => 'segundo_nombre',
        'Primer Apellido' => 'primer_apellido',
        'Segundo Apellido' => 'segundo_apellido',
        'Código Familiar' => 'codigo_familiar',
    ];

    public $textToFind = '';
    public $colSelected = 'Número de Identificación';

    public function render()
    {
        $items = $this->textToFind === '' ?
            $this->getMigranteService()->getAllMigrantesPaginated(30)
            :
            $this->getMigranteService()->filterPaginated($this->fakeColNames[$this->colSelected], $this->textToFind, 30);

        foreach ($items as $item) {
            $item->reside_en_centro = false;
            foreach ($item->expedientes as $expediente) {
                if ($expediente->fecha_salida === null) {
                    $item->reside_en_centro = true;
                }
            }
        }

        return view('livewire.crud.migrantes.ver-migrantes')
            ->with('items', $items);
    }

    #[On('limpiar-filtros-clicked')]
    public function limpiarFiltros()
    {
        $this->textToFind = '';
        $this->colSelected = 'Número de Identificación';
    }

    public function nuevoExpediente($id)
    {
        // pasos para saltarse los primeros pasos del formulario.
        // los primeros 3 son solo para datos personales.
        session([
            'currentStep' => 4,
        ]);
        session(['nombreMigrante' => $this->getMigranteService()->obtenerPrimerNombreApellido($id)]);
        session(['identificacion' => $this->getMigranteService()->obtenerIdentificacion($id)]);
        session(['migranteId' => $id]);
        return $this->redirectRoute('registrar-migrante');
    }

    public function registrarSalida($id)
    {
        return $this->redirectRoute('registrar-salida-migrante', ['migranteId' => $id]);
    }

    public function getMigranteService()
    {
        return app(MigranteService::class);
    }

    public function verHistorial($id)
    {
        return $this->redirectRoute('ver-historial', ['migranteId' => $id]);
    }
}
