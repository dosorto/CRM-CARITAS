<?php

namespace App\Livewire\Crud\Donaciones;

use App\Models\Donacion;
use App\Models\Articulo;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy()]
class VerDonaciones extends Component
{
    public function placeholder()
    {
        return <<<'HTML'
        <div class="size-full h-screen flex items-center justify-center">
            <span class="loading loading-ring loading-lg"></span>
        </div>
        HTML;
    }

    // Esto es para el buscador
    public $fakeColNames = [
        'Nombre del Artículo' => 'articulo.nombre',
        'Código de Barra' => 'articulo.codigo_barra',
        'Fecha de Donación' => 'fecha_donacion',
    ];

    // Nombres de los encabezados de las columnas
    public $colNames = [
        'Nombre del Artículo',
        'Código de Barra',
        'Cantidad Donada',
        'Fecha de Donación',
    ];

    // Atributos de la base de datos que corresponden a los encabezados
    public $keys = [
        'articulo.nombre',
        'articulo.codigo_barra',
        'cantidad_donacion',
        'fecha_donacion',
    ];

    // Acciones disponibles para cada fila de la tabla
    public $actions = [
        [
            'name' => 'edit',
            'component' => 'crud.donaciones.editar-donaciones-modal',
            'parameters' => ['idModal' => 'editDonacionModal'],
        ],
        [
            'name' => 'delete',
            'component' => 'crud.donaciones.eliminar-donaciones-modal',
            'parameters' => ['idModal' => 'deleteDonacionModal'],
        ],

    ];

    // Tamaño de la paginación
    public $paginationSize = 6;

    // Clase del modelo Donación
    public $itemClass = Donacion::class;

    // Modal para crear una nueva donación
    public $idCreateModal = 'createDonacionModal';

    // Propiedad para la búsqueda
    public $search = '';

    // Método para obtener las donaciones con filtros
    public function getDonacionesQueryProperty()
    {
        return Donacion::query()
            ->with('articulo') // Relacionamos con el artículo
            ->when($this->search, function ($query) {
                $query->whereHas('articulo', function ($query) {
                    $query->where('nombre', 'like', '%'.$this->search.'%')
                          ->orWhere('codigo_barra', 'like', '%'.$this->search.'%');
                });
            });
    }

    // Método renderizado de la vista
    public function render()
    {
        $donaciones = $this->getDonacionesQueryProperty()
            ->paginate($this->paginationSize);

        return view('livewire.crud.donaciones.ver-donaciones', compact('donaciones'));
    }
}
