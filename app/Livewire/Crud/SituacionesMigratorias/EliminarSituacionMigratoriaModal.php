<?php

namespace App\Livewire\Crud\SituacionesMigratorias;

use App\Models\SituacionMigratoria;
use Livewire\Component;
use App\Livewire\Components\ContentTable;
use Livewire\Attributes\On;

class EliminarSituacionMigratoriaModal extends Component
{
    public $item; // Modelo que contiene la información que se mostrará al eliminar
    public $idModal; // Identificador único del modal, debido a que hay varias instancias

    // Inicializar Parámetros, estos $parameters se envían desde la vista de content-table y ver-paises
    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
    }

    public function render()
    {
        return view('livewire.crud.situaciones-migratorias.eliminar-situacion-migratoria-modal');
    }

    // ELimina el item
    public function deleteItem()
    {
        $this->item->delete();

        // Envia el evento a la tabla de contenido para actualizarla
        $this->dispatch('item-deleted')->to(ContentTable::class);

        $this->dispatch('close-modal')->self();
    }

    // Este evento se envía cuando se edita el registro en específico
    #[On('update-delete-modal')]
    public function udpateData($id)
    {
        // verifica si el id del item del modal es igual al id del item editado
        // para evitar que todos los modales de eliminar se actualicen con los datos del unico item editado.
        if ($this->item->id === $id) {
            $this->item = SituacionMigratoria::find($id);
        }
    }
}
