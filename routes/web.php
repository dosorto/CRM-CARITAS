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
use App\Livewire\Crud\Donaciones\VerDonaciones;
use App\Livewire\Crud\Donantes\VerDonantes;
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
use App\Livewire\Actas\SolicitudInsumo\CrearSolicitudInsumos;
use App\Livewire\Actas\SolicitudInsumo\InfoSolicitudInsumo;
use App\Livewire\Actas\SolicitudInsumo\VerSolicitudesInsumos;
use App\Livewire\Actas\SolicitudTraslado\CrearSolicitudTraslado;
use App\Livewire\Actas\SolicitudTraslado\InfoSolicitudTraslado;
use App\Livewire\Actas\SolicitudTraslado\VerSolicitudesTraslado;

use App\Livewire\Crud\AsesoresMigratorios\VerAsesoresMigratorios;
use App\Livewire\Crud\Discapacidades\VerDiscapacidades;
use App\Livewire\Crud\Faltas\VerFaltas;
use App\Livewire\Crud\Fronteras\VerFronteras;
use App\Livewire\Crud\GravedadesFaltas\VerGravedadesFaltas;
use App\Livewire\Crud\Migrantes\SalidaMigrante\RegistrarSalidaMigrante;
use App\Livewire\Crud\Necesidades\VerNecesidades;
use App\Livewire\Crud\SituacionesMigratorias\VerSituacionesMigratorias;
use App\Livewire\Crud\TipoDonantes\VerTipoDonantes;
use App\Livewire\Pages\Actas\ActasEntrega;
use App\Livewire\Pages\Actas\ActasEntregaPage;
use App\Livewire\Pages\ActasOptions;
use App\Livewire\Pages\MigrantesOptions;
use App\Livewire\Pages\Reportes;
use App\Livewire\Pages\Solicitudes\SolicitudesTrasladoPage;
use App\Livewire\Pages\Solicitudes\SolicitudTrasladoPage;
use App\Livewire\Pages\Solicitudes\SolicitudesInsumosPage;
use App\Livewire\Reportes\ReporteArticulo;

Route::get('/inicio', Dashboard::class)
    ->middleware('auth');

Route::get('/listado-migrantes', VerMigrantes::class)
    ->name('ver-migrantes')
    ->middleware('auth');

Route::get('/registrar-migrante', RegistrarMigrante::class)->name('registrar-migrante')->middleware('auth');
Route::get('/migrantes', MigrantesOptions::class)->name('migrantes')->middleware('auth');

Route::get('/registrar-salida-migrante', RegistrarSalidaMigrante::class)->name('registrar-salida-migrante')->middleware('auth');

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
Route::get('/ver-expediente', VerFormularios::class)->name('ver-expediente')->middleware('auth');


Route::get('/articulos', VerArticulos::class)
    ->name('ver-articulos')
    ->middleware('auth');
Route::get('/tipodonantes', VerTipoDonantes::class)
    ->name('ver-tipo-donantes')
    ->middleware('auth');
Route::get('/donantes', VerDonantes::class)
    ->name('ver-donantes')
    ->middleware('auth');
Route::get('/donaciones', VerDonaciones::class)
    ->name('ver-donaciones')
    ->middleware('auth');



Route::get('/categoria-articulos', VerCategoriaArticulos::class)
    ->name('ver-categoria-articulos')
    ->middleware('auth');

Route::get('/listado-actas-entrega', VerActasEntrega::class)
    ->name('ver-actas-entrega')
    ->middleware('auth');

Route::get('/crear-acta-entrega', CrearActaEntrega::class)
    ->name('crear-acta-entrega')
    ->middleware('auth');

Route::get('/info-acta-entrega', InfoActaEntrega::class)
    ->name('info-acta-entrega')
    ->middleware('auth');


Route::get('/actas-entrega', ActasEntregaPage::class)
    ->name('actas-entrega-page')
    ->middleware('auth');

Route::get('/actas', ActasOptions::class)
    ->name('actas')
    ->middleware('auth');




Route::get('/solicitudes-traslado', SolicitudesTrasladoPage::class)
    ->name('solicitudes-traslado-page')
    ->middleware('auth');

Route::get('/listado-solicitudes-traslado', VerSolicitudesTraslado::class)
    ->name('ver-solicitudes-traslado')
    ->middleware('auth');

Route::get('/crear-solicitud-traslado', CrearSolicitudTraslado::class)
    ->name('crear-solicitud-traslado')
    ->middleware('auth');

Route::get('/info-solicitud-traslado', InfoSolicitudTraslado::class)
    ->name('info-solicitud-traslado')
    ->middleware('auth');

Route::get('/reporte-mensual', ReporteMensual::class)
    ->name('reporte-mensual')
    ->middleware('auth');

Route::get('/reportes', Reportes::class)
    ->name('reportes')
    ->middleware('auth');


Route::post('/logout', function () {
    FacadesAuth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/'); // Redirecciona a la página de login
})->name('logout');

Route::get('/discapacidades', VerDiscapacidades::class)
    ->name('ver-discapacidades')
    ->middleware('auth');

Route::get('/necesidades', VerNecesidades::class)
    ->name('ver-necesidades')
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


Route::get('/solicitudes-insumos', SolicitudesInsumosPage::class)
    ->name('solicitudes-insumos-page')
    ->middleware('auth');

Route::get('/listado-solicitudes-insumos', VerSolicitudesInsumos::class)
    ->name('ver-solicitudes-insumos')
    ->middleware('auth');

Route::get('/solicitud-insumo', InfoSolicitudInsumo::class)
    ->name('info-solicitud-insumos')
    ->middleware('auth');

Route::get('/crear-solicitud-insumos', CrearSolicitudInsumos::class)
    ->name('crear-solicitud-insumos')
    ->middleware('auth');

Route::get('/reporte-articulos', ReporteArticulo::class)
    ->name('reporte-articulos')
    ->middleware('auth');


Route::get('/faltas-disciplinarias', VerFaltas::class)
    ->name('ver-faltas')
    ->middleware('auth');

Route::get('/gravedades-faltas', VerGravedadesFaltas::class)
    ->name('ver-gravedades-faltas')
    ->middleware('auth');
