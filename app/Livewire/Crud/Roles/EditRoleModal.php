<?php

namespace App\Livewire\Crud\Roles;

use App\Livewire\Components\ContentTable;
use Livewire\Component;

class EditRoleModal extends Component
{
    public $item;
    public $Nombre;
    public $Alfa3;
    public $Numerico;
    public $idModal;

    // Esta funcion se ejecuta una vez, antes de renderizar el componente,
    // hasta que se recargue toda la pagina, no se vuelve a ejecutar.
    public function mount($parameters)
    {
        $this->item = $parameters['item'];
        $this->idModal = $parameters['idModal'];
        $this->Nombre = $this->item->name;
    }




    // Función para editar el item
    public function  editItem()
    {
        // Valida los datos de los inputs ingresados
        $validated = $this->validate([
            // 'wire:model de input' => 'validacion necesaria'
            'Nombre' => 'required'
        ]);

        // Lógica para editar el item, se utilizan los valores validados de la variable '$validated' de arriba
        $rolEdited = $this->item;
        $rolEdited->name = $validated['Nombre'];
        $rolEdited->save();

        // Se envía un evento con el id del pais a ELiminarPaisModal,
        // para actualizar la información instantáneamente cuando se edite el item en específico.
        $this->dispatch('update-delete-modal', id: $rolEdited->id)->to(EliminarRoleModal::class);

        // De igual manera, se envía el evento de item-edited a la tabla para que actualice su contenido.
        $this->dispatch('item-edited')->to(ContentTable::class);

        // este evento se envia en este mismo componente y se escucha en la vista con un script,
        // que cambia el valor del checkbox del modal a 'false', cerrándolo.
        $this->dispatch('close-modal')->self();
    }

    // Esta función se ejecuta cuando se presiona "Cancelar",
    // se resetea el formulario a los últimos valores cargados justo antes de cerrarlo.
    public function closeModal()
    {
        $this->Nombre = $this->item->name;
        $this->dispatch('close-modal')->self();
    }

    public function render()
    {
        return view('livewire.crud.roles.edit-role-modal');
    }
}
