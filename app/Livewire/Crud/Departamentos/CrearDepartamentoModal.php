<?php

namespace App\Livewire\Crud\Departamentos;

use App\Models\Departamento;
use Livewire\Component;
use App\Models\Pais;
use App\Livewire\Components\ContentTable;

class CrearDepartamentoModal extends Component
{
    public $Nombre;
    public $Codigo;
    public $IdPais;
    public $paises;
    public $idModal;

    public function mount($idModal)
    {
        // Inicializa el identificador unico del modal
        // necesario debido a que hay varias instancias del mismo componente
        $this->idModal = $idModal;
        $this->paises = Pais::select('id', 'nombre_pais')->get();
    }

    public function render()
    {
        return view('livewire.crud.departamentos.crear-departamento-modal');
    }

    public function create()
    {
        // Valida los datos de los inputs ingresados
        $validated = $this->validate([
            // 'wire:model de input' => 'validacion necesaria'
            'Nombre' => 'required',
            'Codigo' => 'required',
            'IdPais' => 'required',
        ]);

        // Logica para crear el pais, se usan los datos validados con $validated
        $nuevoDepto = new Departamento();
        $nuevoDepto->nombre_departamento = $validated['Nombre'];
        $nuevoDepto->codigo_departamento = $validated['Codigo'];
        $nuevoDepto->pais_id = $validated['IdPais'];
        $nuevoDepto->save();

        // Se envía el evento de item-created a la tabla para que actualice su contenido.
        $this->dispatch('item-created')->to(ContentTable::class);

        $this->closeModal();
    }

    public function closeModal()
    {
        // este evento se envia en este mismo componente y se escucha en la vista con un script, 
        // que cambia el valor del checkbox del modal a 'false', cerrándolo.
        $this->dispatch('close-modal')->self();
        $this->resetForm();
    }

    public function resetForm()
    {
        // Reinicia los campos de inputs cuando se cierra el modal
        // por defecto se tiene Honduras Seleccionado
        $this->Nombre = '';
        $this->Codigo = '';
        $this->IdPais = 74;  // Honduras
    }


}
