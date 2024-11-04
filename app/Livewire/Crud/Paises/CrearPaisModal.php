<?php

namespace App\Livewire\Crud\Paises;

use App\Livewire\Components\ContentTable;
use App\Models\Pais;
use Livewire\Component;

class CrearPaisModal extends Component
{
    /*
        -------------------------------------------
        Hay mas documentacion en EditarPaisModal Xd
        -------------------------------------------
    */

    public $Nombre;
    public $Alfa3;
    public $Numerico;
    public $idModal;

    public function mount($idModal)
    {
        // Inicializa el identificador unico del modal
        // necesario debido a que hay varias instancias del mismo componente
        $this->idModal = $idModal;
    }

    public function render()
    {
        return view('livewire.crud.paises.crear-pais-modal');
    }

    public function create()
    {
        // Valida los datos de los inputs ingresados
        $validated = $this->validate([
            // 'wire:model de input' => 'validacion necesaria'
            'Nombre' => 'required',
            'Alfa3' => 'required|size:3',
            'Numerico' => 'required|size:3',
        ]);

        // Logica para crear el pais, se usan los datos validados con $validated
        $nuevoPais = new Pais();
        $nuevoPais->nombre_pais = $validated['Nombre'];
        $nuevoPais->codigo_alfa3 = $validated['Alfa3'];
        $nuevoPais->codigo_numerico = $validated['Numerico'];
        $nuevoPais->save();

        // Se envía el evento de item-created a la tabla para que actualice su contenido.
        $this->dispatch('item-created')->to(ContentTable::class);

        // este evento se envia en este mismo componente y se escucha en la vista con un script, 
        // que cambia el valor del checkbox del modal a 'false', cerrándolo.
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->dispatch('close-modal')->self();
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->Nombre = '';
        $this->Alfa3 = '';
        $this->Numerico = '';
    }
}
