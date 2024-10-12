<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Permisos del DASHBOARD
        Permission::create(['name' => 'ver-dashboard']);

        //Permisos del CRUD PAIS
        Permission::create(['name' => 'ver-paises']);
        Permission::create(['name' => 'crear-pais']);
        Permission::create(['name' => 'editar-pais']);
        Permission::create(['name' => 'eliminar-pais']);
        
        //Permisos del CRUD DEPARTAMENTO
        Permission::create(['name' => 'ver-departamento']);
        Permission::create(['name' => 'crear-departamento']);
        Permission::create(['name' => 'editar-departamento']);
        Permission::create(['name' => 'eliminar-departamento']);

        //Permisos del CRUD MUNICIPIO
        Permission::create(['name' => 'ver-municipios']);
        Permission::create(['name' => 'crear-municipio']);
        Permission::create(['name' => 'editar-municipio']);
        Permission::create(['name' => 'eliminar-municipio']);

        //Permisos del CRUD CIUDAD
        Permission::create(['name' => 'ver-ciudades']);
        Permission::create(['name' => 'crear-ciudad']);
        Permission::create(['name' => 'editar-ciudad']);
        Permission::create(['name' => 'eliminar-ciudad']);

        //Permisos del CRUD ROLES
        Permission::create(['name' => 'ver-roles']);
        Permission::create(['name' => 'crear-rol']);
        Permission::create(['name' => 'editar-rol']);
        Permission::create(['name' => 'eliminar-rol']);

        //Permisos del CRUD PERMISOS
        Permission::create(['name' => 'ver-permisos']);

        //Permisos del CRUD ROLES
        Permission::create(['name' => 'ver-usuarios']);
        Permission::create(['name' => 'crear-usuario']);
        Permission::create(['name' => 'editar-usuario']);
        Permission::create(['name' => 'eliminar-usuario']);

        //Permisos del CRUD EMPLEADOS
        Permission::create(['name' => 'ver-empleados']);
        Permission::create(['name' => 'crear-empleado']);
        Permission::create(['name' => 'editar-empleado']);
        Permission::create(['name' => 'eliminar-empleado']);
    }
}
