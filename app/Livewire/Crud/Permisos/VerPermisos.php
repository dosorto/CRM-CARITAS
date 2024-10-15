<?php

namespace App\Livewire\Crud\Permisos;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Livewire\WithPagination;

class VerPermisos extends Component
{
    public function render()
    {
        $permisos = Permission::paginate(10);
        return view('livewire.crud.permisos.ver-permisos')->with('datos', $permisos);
    }
}
