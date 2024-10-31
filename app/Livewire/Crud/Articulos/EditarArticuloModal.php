<?php

namespace App\Livewire\Crud\Articulos;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\SubCategoria;
use Livewire\Component;

class EditarArticuloModal extends Component
{
    public $item;  // Artículo a editar
    public $nombre;
    public $descripcion;
    public $codigo_barra;
    public $cantidad_stock;
    public $subcategoria_id;
    public $categorias;
    public $subcategorias;
    public $idModal;

    public function editItem()
    {
        $validated = $this->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'codigo_barra' => 'required|string|max:255',
            'cantidad_stock' => 'required|integer|min:0',
            'subcategoria_id' => 'required|exists:subcategorias,id',
        ]);

        // Actualizar los valores del artículo
        $articuloEdited = $this->item;
        $articuloEdited->nombre = $validated['nombre'];
        $articuloEdited->descripcion = $validated['descripcion'];
        $articuloEdited->codigo_barra = $validated['codigo_barra'];
        $articuloEdited->cantidad_stock = $validated['cantidad_stock'];
        $articuloEdited->subcategoria_id = $validated['subcategoria_id'];

        $articuloEdited->save();

        // Emitir eventos para cerrar el modal y notificar que el artículo ha sido editado
        $this->dispatch('close-modal');
        $this->dispatch('item-edited');
    }

    public function resetForm()
    {
        // Inicializar los valores del formulario con los datos actuales del artículo
        $this->nombre = $this->item->nombre;
        $this->descripcion = $this->item->descripcion;
        $this->codigo_barra = $this->item->codigo_barra;
        $this->cantidad_stock = $this->item->cantidad_stock;
        $this->subcategoria_id = $this->item->subcategoria_id;
        $this->categorias = Categoria::all();  // Obtener todas las categorías para el selector
        $this->subcategorias = SubCategoria::all();  // Obtener todas las subcategorías para el selector
    }

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.crud.articulos.editar-articulo-modal');
    }
}
