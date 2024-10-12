<?php

namespace App\Livewire\Usuarios;
use App\Models\User;
use Hash;
use Livewire\Component;
use Livewire\WithPagination;


class Usuarios extends Component
{

    /*aqui voy a empezar, para hacer variables esta parte xd lo pongo para que no se  me olvide*/
    use WithPagination;
    public $name, $email, $password;
    public $abrirModal = false;
    public $usuario;

    public $modeEditar = false;

    public $texto_busqueda = '';

    public $modeEliminar = false;


    public function rules() /*reglas, funcion para los formularios*/
    {
        return [
            'name' => 'required|min:4|unique:users,name',
            'email' => 'required|unique:users,email'
            /*voy autogenerar la contraseñaxd*/
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El usuarios es necesario.',
            'name.unique' => 'El usuario que ingresate ya esta en uso',
            'name.min' => 'El usuario debe tener minimo 8 caracteres.',
            'email.required' => 'El email es necesario',
            'email.unique' => 'Este email ya esta en uso'
        ];
    }


    public function filtrarDatos()
    {
        return User::where('name', 'like', '%' . $this->texto_busqueda . '%')->paginate(5);

    }


    public function render()
    {
        $usuarios = $this->filtrarDatos();
        return view('livewire.usuarios.usuarios',['usuarios'=> $usuarios]);


    }



    public function modalAgregar(){
        $this->abrirModal = true;
    }
    public function toUsuarios(){
        $this->abrirModal = false;
        $this->modeEditar = false;
        $this->modeEliminar = false;/* xd*/
        $this->name = '';
        $this->email = '';
    }

    public function agregarUsuario()
    {
         /* valido regalas xd  $this->validate(); */

        if( $this->validate()){

            $usuario = new User();
            $usuario->name = $this->name;
            $usuario->email = $this->email;
            $usuario->password = Hash::make(12345678);
            $usuario->save();
            $this->abrirModal = false;
            $this->name = '';
            $this->email = '';

            /* Esto es para limpiar xd , recordar estooo*/
        }
        else {
            /*Poner noticiacion por si hay errores ver video */

        }

    }

    public function modeEdit($id){
        $this->usuario = User::find($id);
        $this->name = $this->usuario->name;
        $this->email = $this->usuario->email;
        $this->modeEditar = true;

    }

    public function edit(){
        $this->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        if($this->usuario){
            $this->usuario->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $this->modeEditar = false;
            $this->name = '';
            $this->email = '';
        }
    }

    public function modeDelete($id){
        $this->usuario = User::find($id);
        $this->name = $this->usuario->name;
        $this->email = $this->usuario->email;
        $this->modeEliminar = true;


    }

    public function eliminarUsuario(){
        if($this->usuario){
            $this->usuario->delete();
             $this->modeEliminar = false;
             $this->name = '';
             $this->email = '';
        }
    }


}
// aqui va toda la programacion xd -- Ingrid Baquedano

