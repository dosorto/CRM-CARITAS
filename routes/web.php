<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Crud\Ciudades\VerCiudades;
use App\Livewire\Crud\Faltas\VerFaltas;
use App\Livewire\Crud\GravedadFaltas\VerGravedadFaltas;
use App\Livewire\Crud\Departamentos\VerDepartamentos;
use App\Livewire\Crud\Paises\VerPaises;
use App\Livewire\Usuarios\Usuarios;
use App\Livewire\Crud\Roles\VerRoles;
use App\Livewire\Crud\Permisos\VerPermisos;


// Route::view('/', 'welcome');
use App\Livewire\Crud\Migrantes\CrearMigrante;
use App\Livewire\Crud\Migrantes\EditarMigrante;
use App\Livewire\Crud\Migrantes\VerMigrantes;


use App\Livewire\PasswordRecovery;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Crud\Faltas\CrearFalta;


use App\Livewire\Empleados\Empleados;


Route::get('/', function () {
    return view('welcome');
});


// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::get('/', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/gravedad-faltas', VerGravedadFaltas::class)
    ->middleware(['auth'])
    ->name('ver-gravedad-faltas');


Route::get('/faltas', VerFaltas::class)
    ->middleware(['auth'])
    ->name('ver-faltas');

Route::get('/usuarios', Usuarios::class)
    ->middleware(['auth'])
    ->name('ver-usuarios');

Route::get('/roles', VerRoles::class)
    ->middleware(['auth'])
    ->name('ver-roles');


Route::get('/paises', VerPaises::class)
    ->middleware(['auth'])
    ->name('ver-paises');

Route::get('/departamentos', VerDepartamentos::class)
    ->middleware(['auth'])
    ->name('ver-departamentos');


require __DIR__ . '/auth.php';
Route::get('/migrantes', VerMigrantes::class);
Route::get('/migrantes/registrar', CrearMigrante::class)
    ->name('crear-migrante');
Route::get('/migrantes/editar/{id}', EditarMigrante::class)
    ->name('editar-migrante');
Route::get('/ciudades', VerCiudades::class);





Route::get('/pais', VerPaises::class);
Route::get('/departamento', VerDepartamentos::class);
Route::get('/empleados', Empleados::class);
Route::get('/recuperar-contrasena', PasswordRecovery::class)->name('password.recovery');


Route::get('/permisos', VerPermisos::class)
    ->middleware(['auth'])
    ->name('ver-permisos');