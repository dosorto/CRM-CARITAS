<?php

namespace App\Livewire\Crud\Usuarios;

use App\Livewire\Components\ContentTable;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CrearUsuarioModal extends Component
{
    public $idModal;

    public $nombre;
    public $apellido;
    public $identidad;
    public $telefono;
    public $fechaNacimiento;
    public $estadoCivil;
    public $correo;
    public $password;
    public $confirmPassword;

    public $roles;
    public $selectedRoles = [];

    public function crearUsuario()
    {
        $validated = $this->validate([
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'identidad' => 'required|string|unique:users',
            'telefono' => 'required|string|unique:users',
            'fechaNacimiento' => 'required|date',
            'estadoCivil' => 'required|string|max:20',
            'correo' => 'required|email|max:50|unique:users,email',
            'password' => 'required|string|min:4',
            'confirmPassword' => 'same:password',
            'selectedRoles' => 'array|min:1'
        ]);

        $nuevoUsuario = new User();
        $nuevoUsuario->nombre = $validated['nombre'];
        $nuevoUsuario->apellido = $validated['apellido'];
        $nuevoUsuario->identidad = $validated['identidad'];
        $nuevoUsuario->telefono = $validated['telefono'];
        $nuevoUsuario->fecha_nacimiento = $validated['fechaNacimiento'];
        $nuevoUsuario->estado_civil = $validated['estadoCivil'];
        $nuevoUsuario->email = $validated['correo'];
        $nuevoUsuario->password = Hash::make($validated['password']);

        $nuevoUsuario->save();

        $roles = Role::whereIn('id', $validated['selectedRoles'])->get();

        $nuevoUsuario->syncRoles($roles);

        $this->cerrarModal();
        $this->dispatch('item-created')->to(ContentTable::class);
    }

    public function cerrarModal()
    {
        // limpiar todos los campos
        $this->nombre = '';
        $this->apellido = '';
        $this->identidad = '';
        $this->telefono = '';
        $this->fechaNacimiento = '';
        $this->estadoCivil = '';
        $this->correo = '';
        $this->password = '';
        $this->confirmPassword = '';
        $this->selectedRoles = [];

        $this->dispatch('cerrar-modal')->self();
    }

    public function mount($idModal)
    {
        $this->idModal = $idModal;
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.crud.usuarios.crear-usuario-modal');
    }
}
