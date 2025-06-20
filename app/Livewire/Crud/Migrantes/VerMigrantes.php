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
            // Reside si el último expediente no tiene fecha de salida
            $ultimoExpediente = $item->expedientes->sortByDesc('created_at')->first();
            $item->reside_en_centro = $ultimoExpediente && $ultimoExpediente->fecha_salida === null;
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
        dd('Oops... Esto no debería haber ocurrido, no se admiten más de 1 expediente por migrante. (:');
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

    #[On('salida-anulada')]
    public function salidaAnulada() {
        $this->render();
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
