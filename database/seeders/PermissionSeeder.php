<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Regiones
        // Permission::create(['name' => 'ver-paises']);
        // Permission::create(['name' => 'administrar-paises']);

        // Permission::create(['name' => 'ver-departamentos']);
        // Permission::create(['name' => 'administrar-departamentos']);

        // Permission::create(['name' => 'ver-ciudades']);
        // Permission::create(['name' => 'administrar-ciudades']);

        // // Usuarios, Roles y Permisos
        // Permission::create(['name' => 'ver-usuarios']);
        // Permission::create(['name' => 'ver-roles']);
        // Permission::create(['name' => 'administrar-usuarios']);
        // Permission::create(['name' => 'administrar-roles']);

        // // Migrantes
        // Permission::create(['name' => 'ver-migrantes']);
        // Permission::create(['name' => 'registrar-migrantes']);
        // Permission::create(['name' => 'registrar-salida-de-migrante']);
        // Permission::create(['name' => 'ver-faltas-de-migrante']);
        // Permission::create(['name' => 'asignar-falta-a-migrante']);

        // // Expedientes
        // Permission::create(['name' => 'ver-expediente']);
        // Permission::create(['name' => 'imprimir-expediente']);
        // Permission::create(['name' => 'ver-discapacidades']);
        // Permission::create(['name' => 'ver-situaciones-migratorias']);
        // Permission::create(['name' => 'ver-asesores-migratorios']);
        // Permission::create(['name' => 'ver-fronteras']);
        // Permission::create(['name' => 'ver-necesidades']);
        // Permission::create(['name' => 'ver-motivos-salida-de-pais']);
        // Permission::create(['name' => 'ver-faltas-disciplinarias']);

        // // Permisos para administrar todo lo de Expedientes
        // Permission::create(['name' => 'administrar-discapacidades']);
        // Permission::create(['name' => 'administrar-situaciones-migratorias']);
        // Permission::create(['name' => 'administrar-asesores-migratorios']);
        // Permission::create(['name' => 'administrar-fronteras']);
        // Permission::create(['name' => 'administrar-necesidades']);
        // Permission::create(['name' => 'administrar-faltas-disciplinarias']);

        // Permission::create(['name' => 'editar-registros-de-asesoria']);
        // Permission::create(['name' => 'editar-situacion-migratoria']);

        // //Permisos para administrar todo lo de articulos
        // Permission::create(['name' => 'ver-articulos']);
        // Permission::create(['name' => 'ver-categorias-de-articulos']);

        // //Permisos para administrar todo lo de articulos
        // Permission::create(['name' => 'ver-actas-de-entrega']);
        // Permission::create(['name' => 'crear-actas-de-entrega']);

        // // Donaciones
        // Permission::create(['name' => 'ver-donantes']);
        // Permission::create(['name' => 'ver-tipos-de-donantes']);
        // Permission::create(['name' => 'ver-donaciones']);
        // Permission::create(['name' => 'donaciones']);
        // Permission::create(['name' => 'crear-donaciones']);
        // Permission::create(['name' => 'ver-encuestas']);
        // Permission::create(['name' => 'generar-reportes-de-migrantes']);


        // NUEVOS
        // --------------------------------------------------------------------------
        // try {
        //     $admin = Role::where('name', 'admin')->first();
        //     $permissions = Permission::all();
        //     $admin->syncPermissions($permissions);
        // } catch (Exception $e) {
        // }
    }
}
