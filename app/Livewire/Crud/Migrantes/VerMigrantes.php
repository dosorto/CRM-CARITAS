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
        return view('livewire.crud.migrantes.ver-migrantes')
            ->with('items', $items);
    }

    #[On('limpiar-filtros-clicked')]
    public function limpiarFiltros()
    {
        $this->textToFind = '';
        $this->colSelected = 'Número de Identificación';
    }

    public function registrarSalida($id)
    {
        session(['migranteId' => $id]);
        return redirect(route('registrar-salida-migrante'));
    }

    public function getMigranteService()
    {
        return app(MigranteService::class);
    }
}
