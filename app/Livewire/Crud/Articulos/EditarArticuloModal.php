<?php

namespace App\Livewire\Crud\Articulos;

use App\Livewire\Components\ContentTable;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\CategoriaArticulo;
use Livewire\Component;

class EditarArticuloModal extends Component
{
    public $item;  // Artículo a editar
    public $nombre;
    public $descripcion;
    public $codigo_barra;
    public $cantidad_stock;
    public $categoria_articulos_id;
    public $categorias;
    public $subcategorias;
    public $idModal;
    public $categoria_articulos;
    public function editItem()
    {
        $validated = $this->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'codigo_barra' => 'required|string|max:255',
            'cantidad_stock' => 'required|integer|min:0',
            'categoria_articulos_id' => 'required|exists:categoria_articulos,id',
        ]);

        // Actualizar los valores del artículo
        $articuloEdited = $this->item;
        $articuloEdited->nombre = $validated['nombre'];
        $articuloEdited->descripcion = $validated['descripcion'];
        $articuloEdited->codigo_barra = $validated['codigo_barra'];
        $articuloEdited->cantidad_stock = $validated['cantidad_stock'];
        $articuloEdited->categoria_articulos_id = $validated['categoria_articulos_id'];

        $articuloEdited->save();

        // Emitir eventos para cerrar el modal y notificar que el artículo ha sido editado
        $this->dispatch('item-edited')->to(ContentTable::class);
        $this->closeModal();
    }

    public function resetForm()
    {
        // Inicializar los valores del formulario con los datos actuales del artículo
        $this->nombre = $this->item->nombre;
        $this->descripcion = $this->item->descripcion;
        $this->codigo_barra = $this->item->codigo_barra;
        $this->cantidad_stock = $this->item->cantidad_stock;
        $this->categoria_articulos_id = $this->item->categoria_articulos_id;
        $this->categoria_articulos = CategoriaArticulo::all();  // Obtener todas las subcategorías para el selector
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->dispatch('close-modal')->self();
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }

    public function render()
    {
        return view('livewire.crud.articulos.editar-articulo-modal');
    }
}
