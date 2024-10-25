<?php

namespace App\Livewire\Crud\Paises;

use App\Models\Pais;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\On;

class VerPaises extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $fakeColNames = [
        'Nombre del Pais' => 'nombre_pais',
        'Codigo alfa-3' => 'codigo_alfa3',
        'Codigo Numérico' => 'codigo_numerico',
    ];

    public function render()
    {
        $colNames = ['Nombre del País', 'Código alfa-3', 'Código Numérico'];
        $keys = ['nombre_pais', 'codigo_alfa3', 'codigo_numerico'];

        $actions = [];

        return view('livewire.crud.paises.ver-paises')
            ->with('colNames', $colNames)
            ->with('keys', $keys)
            ->with('itemClass', Pais::class);
    }

    #[On('item-created')]
    public function paisCreated(){
        $this->resetPage();
    }
}
