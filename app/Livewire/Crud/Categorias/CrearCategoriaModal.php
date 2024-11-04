<?php

namespace App\Livewire\Crud\Categorias;

use App\Livewire\Components\ContentTable;
use App\Livewire\Crud\Mobiliarios\CrearMobiliarioModal;
use App\Livewire\Crud\Mobiliarios\EliminarMobiliarioModal;
use App\Livewire\Crud\SubCategorias\CrearSubCategoriaModal;
use App\Models\Categoria;
use Livewire\Component;

class CrearCategoriaModal extends Component
{
    public $Nombre;
    public $idModal;

    public function create()
    {
        $validated = $this->validate([
            'Nombre' => 'required',
        ]);

        $nueva_categoria = new Categoria();
        $nueva_categoria->nombre_categoria = $validated['Nombre'];
        $nueva_categoria->save();
        
        $this->dispatch('update-create-modal', id: $nueva_categoria->id)->to(CrearMobiliarioModal::class);
        $this->dispatch('update-ensubcategoria-modal', id: $nueva_categoria->id)->to(CrearSubCategoriaModal::class);
        $this->dispatch('item-created')->to(ContentTable::class);
        $this->closeModal();
    }
    
    public function closeModal()
    {
        $this->dispatch('close-modal')->self();
        $this->Nombre = '';
    }

    public function mount($idModal)
    {
        $this->idModal = $idModal;
    }

    public function render()
    {
        return view('livewire.crud.categorias.crear-categoria-modal');
    }
}
