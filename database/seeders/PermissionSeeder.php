<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // //Permisos del DASHBOARD
        Permission::create(['name' => 'Ver Dashboard']);

        //Permisos del CRUD PAIS
        Permission::create(['name' => 'Administrar Paises']);

        //Permisos del CRUD DEPARTAMENTO
        Permission::create(['name' => 'Administrar Departamentos']);

        //Permisos del CRUD CIUDAD
        Permission::create(['name' => 'Administrar Ciudades']);

        //Permisos del CRUD ROLES
        Permission::create(['name' => 'Administrar Roles']);

        //Permisos del CRUD PERMISOS
        Permission::create(['name' => 'Administrar Permisos']);

        //Permisos del CRUD ROLES
        Permission::create(['name' => 'Administrar Usuarios']);

        //Permisos del CRUD EMPLEADOS
        Permission::create(['name' => 'Administrar Empleados']);
    }
}
