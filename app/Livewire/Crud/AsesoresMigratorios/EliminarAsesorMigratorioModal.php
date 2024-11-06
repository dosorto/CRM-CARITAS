<?php

namespace App\Livewire\Crud\AsesoresMigratorios;

use App\Livewire\Components\ContentTable;
use App\Models\AsesorMigratorio;
use Livewire\Component;
use Livewire\Attributes\On;

class EliminarAsesorMigratorioModal extends Component
{
    public $item;
    public $idModal;

    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }

    public function render()
    {
        return view('livewire.crud.asesores-migratorios.eliminar-asesor-migratorio-modal');
    }

    public function deleteItem()
    {
        $this->item->delete();

        $this->dispatch('item-deleted')->to(ContentTable::class);

        $this->dispatch('close-modal')->self();
    }

    #[On('update-delete-modal')]
    public function udpateData($id)
    {
        if ($this->item->id === $id) {
            $this->item = AsesorMigratorio::find($id);
        }
    }
}
