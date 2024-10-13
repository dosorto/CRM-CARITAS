<?php

namespace App\Livewire\Empleados;

use Livewire\Component;
use App\Models\Empleado;
use Livewire\WithPagination;
use App\Models\Departamento;
use App\Models\User;
use Hash;

class Empleados extends Component
{


    use WithPagination;
    public $nombre, $apellido, $identidad, $telefono, $fecha_nacimiento, $estado_civil, $departamento_id;
    public $abrirModal = false;

    public $email;
    public $empleado;

    public $modeEditar = false;

    public $texto_busqueda = '';

    public $modeEliminar = false;


    public function rules() /*reglas, funcion para los formularios*/
    {
        return [
            'nombre' => 'required',
            'apellido' => 'required',
            'identidad' => ['required', 'size:15', 'regex:/^\d{4}-\d{4}-\d{5}$/','unique:empleados,identidad'],
            'telefono' => ['required', 'size:9', 'regex:/^\d{4}-\d{4}$/','unique:empleados,telefono'],
            'fecha_nacimiento' => 'before:today|required',
            'estado_civil' => 'required',
            'departamento_id' => 'required',
            'email' => 'required|unique:users,email',


        ];
    }




    public function messages()
    {
        return [
            'nombre.required' => 'El campo es requerido',
            'apellido.required' => 'El campo es requerido',
            'identidad.required' => 'El campo es requerido',
            'telefono.required' => 'El campo es requerido',
            'fecha_nacimiento.required' => 'El campo es requerido',
            'identidad.unique' => 'La identidad pertenece a otro empleado.',
            'identidad.size' => 'La identidad debe ser de 15 caracteres.',
            'identidad.regex' => 'Formato esperado: "0000-0000-00000"',
            'telefono.unique' => 'El telefono ya pertenece a un empleado',
            'telefono.size' => 'El telefono debe tener 9 caracteres',
            'telefono.regex' => 'Formato esperado: "1234-5678"',
            'fecha_nacimiento.before' => 'La fecha debe ser menor a la actual'
        ];
    }

    public function filtrarDatos()
    {
    return Empleado::where('nombre', 'like', '%' . $this->texto_busqueda . '%')
        ->orWhere('apellido', 'like', '%' . $this->texto_busqueda . '%')
        ->orWhere('identidad', 'like', '%' . $this->texto_busqueda . '%')
        ->paginate(5);
    }


    public function render()
    {
        $empleados = $this->filtrarDatos();
        $departamentos = Departamento::all();
        return view('livewire.empleados.empleados ',['empleados'=> $empleados, 'departamentos'=>$departamentos]);
    }

    public function modalAgregar(){
        $this->abrirModal = true;
    }

    public function toEmpleados(){
        $this->abrirModal = false;
        $this->modeEditar = false;
        $this->modeEliminar = false;/* xd*/
        $this->nombre  = '';
        $this->apellido = '';
        $this->identidad = '';
        $this->telefono = '';
        $this->fecha_nacimiento = '';
        $this->estado_civil = '';
        $this->departamento_id = '';
    }

    public function agregarEmpleado()
    {
         /* valido regalas xd  $this->validate(); */

        if( $this->validate()){

            $empleado = new Empleado();

            $empleado->nombre = $this->nombre;
            $empleado->apellido = $this->apellido;
            $empleado->identidad = $this->identidad;
            $empleado->telefono = $this->telefono;
            $empleado->fecha_nacimiento = $this->fecha_nacimiento;
            $empleado->estado_civil = $this->estado_civil;
            $empleado->departamento_id = $this->departamento_id;

            $empleado->save();

            $this->crearUsuario($empleado);


            $this->toEmpleados();

            /* Esto es para limpiar xd , recordar estooo*/
        }
        else {
            /*Poner noticiacion por si hay errores ver video */

        }

    }

    public function crearUsuario($empleado) {

        // Separar los nombres y apellidos
    $nombres = explode(' ', $empleado->nombre);
    $apellidos = explode(' ', $empleado->apellido);

    // Obtener el primer nombre y el primer apellido
    $primerNombre = $nombres[0];
    $primerApellido = $apellidos[0];

    // La fecha de nacimiento ya es un DateTime por ser de tipo 'date' en la base de datos
    $fechaNacimiento = $empleado->fecha_nacimiento;

    // Formatear día y mes de la fecha de nacimiento
    $dia = $fechaNacimiento->format('d');
    $mes = $fechaNacimiento->format('m');

    // Crear el nombre de usuario
    $nombreUsuario = strtolower($primerNombre . '.' . $primerApellido . $dia . $mes);

        $usuario = new User();
        $usuario->name = $nombreUsuario;
        $usuario->email = $this->email;
        $usuario->password = Hash::make(12345678);
        $usuario->empleado_id = $empleado->id;
        $usuario->save();








    }



    public function modeEdit($id){
        $this->empleado = Empleado::find($id);
        $this->nombre  = $this->empleado->nombre;
        $this->apellido = $this->empleado->apellido;
        $this->identidad = $this->empleado->identidad;
        $this->telefono = $this->empleado->telefono;
        $this->fecha_nacimiento = $this->empleado->fecha_nacimiento;
        $this->estado_civil = $this->empleado->estado_civil;
        $this->departamento_id = $this->empleado->departamento_id;
        $this->modeEditar = true;

    }

    public function edit(){
        $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'identidad' => ['required', 'size:15', 'regex:/^\d{4}-\d{4}-\d{5}$/'],
            'telefono' => ['required', 'size:9', 'regex:/^\d{4}-\d{4}$/'],
            'fecha_nacimiento' => 'before:today|required',
            'departamento_id' => 'required',
            'estado_civil' => 'required'
        ]);

        if($this->empleado){
            $this->empleado->update([
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'identidad' => $this->identidad,
                'telefono' => $this->telefono,
                'estado_civil' => $this->estado_civil,
                'fecha_nacimiento' => $this->fecha_nacimiento,
                'departamento_id' => $this->departamento_id,

            ]);
           $this->toEmpleados();
        }
    }

    public function modeDelete($id){
        $this->empleado = Empleado::find($id);
        $this->nombre  = $this->empleado->nombre;
        $this->apellido = $this->empleado->apellido;
        $this->identidad = $this->empleado->identidad;
        $this->telefono = $this->empleado->telefono;
        $this->fecha_nacimiento = $this->empleado->fecha_nacimiento;
        $this->estado_civil = $this->empleado->estado_civil;
        $this->departamento_id = $this->empleado->departamento_id;
        $this->modeEliminar = true;


    }

    public function eliminarEmpleado(){
        if($this->empleado){
            $this->empleado->delete();
             $this->modeEliminar = false;
             $this->toEmpleados();
        }
    }


}
// aqui va toda la programacion xd -- Ingrid Bichota

