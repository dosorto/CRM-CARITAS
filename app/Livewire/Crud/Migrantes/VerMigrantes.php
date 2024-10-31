<?php

namespace App\Livewire\Crud\Migrantes;

use App\Models\Migrante;
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
        'Nombres' => 'nombres',
        'Apellidos' => 'apellidos',
        'Código Familiar' => 'codigo_familiar',
    ];

    public $textToFind = '';
    public $colSelected = 'Número de Identificación';

    public function buscar()
    {
        if ($this->textToFind === '')
        {
            return Migrante::paginate(30);
        }
        else
        {
            return Migrante::where($this->fakeColNames[$this->colSelected], 'LIKE', '%' . $this->textToFind . '%')->paginate(30);
        }
           
            
            
    }

    public function render()
    {
        $items = $this->buscar();
        return view('livewire.crud.migrantes.ver-migrantes')
            ->with('items', $items);
    }

    #[On('limpiar-filtros-clicked')]
    public function limpiarFiltros()
    {
        $this->textToFind = '';
        $this->colSelected = 'Número de Identificación';
    }
}
