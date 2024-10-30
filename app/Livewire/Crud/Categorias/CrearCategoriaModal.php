<?php

namespace App\Livewire\Crud\Categorias;

use App\Livewire\Components\ContentTable;
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
