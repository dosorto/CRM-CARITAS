<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Crud\Articulos\VerArticulos;
use App\Livewire\Crud\CategoriaArticulos\VerCategoriaArticulos;
use App\Livewire\Crud\Categorias\VerCategorias;
use App\Livewire\Crud\Ciudades\VerCiudades;
use App\Livewire\Crud\Departamentos\VerDepartamentos;
use App\Livewire\Crud\Migrantes\RegistrarMigrante;
use App\Livewire\Crud\Migrantes\VerMigrantes;
use App\Livewire\Crud\Paises\VerPaises;
use App\Livewire\Login;
use App\Livewire\Pages\Administracion;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Livewire\Crud\SubCategorias\VerSubCategorias;
use App\Livewire\Crud\Mobiliarios\VerMobiliarios;
use App\Livewire\Crud\Formularios\VerFormularios;
use App\Livewire\Reportes\ReporteMensual;

use App\Livewire\Actas\ActasEntrega\CrearActaEntrega;
use App\Livewire\Actas\ActasEntrega\InfoActaEntrega;
use App\Livewire\Actas\ActasEntrega\VerActasEntrega;
use App\Livewire\Crud\AsesoresMigratorios\VerAsesoresMigratorios;
use App\Livewire\Crud\Discapacidades\VerDiscapacidades;
use App\Livewire\Crud\Fronteras\VerFronteras;
use App\Livewire\Crud\SituacionesMigratorias\VerSituacionesMigratorias;

Route::get('/inicio', Dashboard::class)
    ->middleware('auth');

Route::get('/migrantes', VerMigrantes::class)
    ->name('ver-migrantes')
    ->middleware('auth');

Route::get('/registrar-migrante', RegistrarMigrante::class)->name('registrar-migrante')->middleware('auth');

Route::get('/administracion', Administracion::class)
    ->name('administracion')
    ->middleware('auth');

Route::get('/paises', VerPaises::class)
    ->name('ver-paises')
    ->middleware('auth');

Route::get('/departamentos', VerDepartamentos::class)
    ->name('ver-departamentos')
    ->middleware('auth');

Route::get('/ciudades', VerCiudades::class)
    ->name('ver-ciudades')
    ->middleware('auth');

Route::get('/', Login::class)
    ->name('login');

Route::get('/categorias', VerCategorias::class)
    ->name('ver-categorias')->middleware('auth');

Route::get('/subcategorias', VerSubCategorias::class)
    ->name('ver-sub-categorias')->middleware('auth');

Route::get('/mobiliarios', VerMobiliarios::class)->name('ver-mobiliarios')->middleware('auth');
Route::get('/formularios', VerFormularios::class)->name('ver-formulario')->middleware('auth');

Route::get('/articulos', VerArticulos::class)
    ->name('ver-articulos')
    ->middleware('auth');

Route::get('/categoria-articulos', VerCategoriaArticulos::class)
    ->name('ver-categoria-articulos')
    ->middleware('auth');

Route::get('/actas-entrega', VerActasEntrega::class)
    ->name('ver-actas-entrega')
    ->middleware('auth');

Route::get('/crear-acta-entrega', CrearActaEntrega::class)
    ->name('crear-acta-entrega')
    ->middleware('auth');

Route::get('/info-acta-entrega', InfoActaEntrega::class)
    ->name('info-acta-entrega')
    ->middleware('auth');

Route::get('/reportes', ReporteMensual::class)->name('reporte-mensual')->middleware('auth');


Route::post('/logout', function () {
    FacadesAuth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/'); // Redirecciona a la página de login
})->name('logout');

Route::get('/discapacidades', VerDiscapacidades::class)
    ->name('ver-discapacidades')
    ->middleware('auth');

Route::get('/situaciones-migratorias', VerSituacionesMigratorias::class)
    ->name('ver-situaciones-migratorias')
    ->middleware('auth');

Route::get('/asesores-migratorios', VerAsesoresMigratorios::class)
    ->name('ver-asesores-migratorios')
    ->middleware('auth');

Route::get('/fronteras', VerFronteras::class)
    ->name('ver-fronteras')
    ->middleware('auth');
