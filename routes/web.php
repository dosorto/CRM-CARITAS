<?php

use App\Livewire\AboutUs\AboutPage;
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
use App\Livewire\Admin\VerSolicitudesPendientes;
use App\Livewire\Crud\AsesoresMigratorios\VerAsesoresMigratorios;
use App\Livewire\Crud\Discapacidades\VerDiscapacidades;
use App\Livewire\Crud\Donaciones\CrearDonaciones;
use App\Livewire\Crud\Faltas\VerFaltas;
use App\Livewire\Crud\Fronteras\VerFronteras;
use App\Livewire\Crud\GravedadesFaltas\VerGravedadesFaltas;
use App\Livewire\Crud\Migrantes\SalidaMigrante\RegistrarSalidaMigrante;
use App\Livewire\Crud\Necesidades\VerNecesidades;
use App\Livewire\Crud\SituacionesMigratorias\VerSituacionesMigratorias;
use App\Livewire\Crud\TipoDonantes\VerTipoDonantes;
use App\Livewire\Pages\Actas\ActasEntregaPage;
use App\Livewire\Pages\ActasOptions;
use App\Livewire\Pages\Donaciones\DonacionPage;
use App\Livewire\Pages\MigrantesOptions;
use App\Livewire\Pages\Reportes;
use App\Livewire\Pages\Solicitudes\SolicitudesTrasladoPage;
use App\Livewire\Pages\Solicitudes\SolicitudesInsumosPage;
use App\Livewire\Reportes\ReporteArticulo;
use App\Livewire\Crud\Migrantes\HistorialMigrante;
use App\Livewire\Crud\Migrantes\RegistroConducta;

Route::get('/', Login::class)
    ->name('login');

Route::post('/logout', function () {
    FacadesAuth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/'); // Redirecciona a la página de login
})->name('logout');

Route::get('/acerca-de-nosotros', AboutPage::class)
    ->name('about-us');

Route::middleware(['auth'])->group(function () {

    // ---------------- Dashboard ----------------

    Route::get('/inicio', Dashboard::class)
        ->name('inicio');

    // ---------------- Migrantes ----------------

    Route::get('/registrar-migrante', RegistrarMigrante::class)
        ->name('registrar-migrante');
    // ->middleware('can: Registrar Migrante');

    Route::get('/migrantes', MigrantesOptions::class)
        ->name('migrantes');
    // ->middleware('can: Ver Migrantes');

    Route::get('/registrar-salida-migrante/{migranteId}', RegistrarSalidaMigrante::class)
        ->name('registrar-salida-migrante');
    // ->middleware('can: Registrar Salida Migrante');

    Route::get('/listado-migrantes', VerMigrantes::class)
        ->name('ver-migrantes');

    Route::get('/registro-conducta/{migranteId}', RegistroConducta::class)
        ->name('registro-conducta');

    // ---------------- Expedientes de Migrantes ----------------

    Route::get('/ver-expediente/{expedienteId}', VerFormularios::class)
        ->name('ver-expediente');

    Route::get('/discapacidades', VerDiscapacidades::class)
        ->name('ver-discapacidades');

    Route::get('/necesidades', VerNecesidades::class)
        ->name('ver-necesidades');

    Route::get('/situaciones-migratorias', VerSituacionesMigratorias::class)
        ->name('ver-situaciones-migratorias');

    Route::get('/asesores-migratorios', VerAsesoresMigratorios::class)
        ->name('ver-asesores-migratorios');

    Route::get('/fronteras', VerFronteras::class)
        ->name('ver-fronteras');

    Route::get('/faltas-disciplinarias', VerFaltas::class)
        ->name('ver-faltas');

    Route::get('/gravedades-faltas', VerGravedadesFaltas::class)
        ->name('ver-gravedades-faltas');

    Route::get('/historial/{migranteId}', HistorialMigrante::class)
        ->name('ver-historial');


    // ---------------- Manteminiento General ----------------

    Route::get('/gravedades-faltas', VerGravedadesFaltas::class)
        ->name('ver-gravedades-faltas');

    Route::get('/ver-solicitudes-pendientes', VerSolicitudesPendientes::class)
        ->name('ver-solicitudes-pendientes');

    Route::get('/administracion', Administracion::class)
        ->name('administracion');


    // ---------------- Localizaciones ----------------

    Route::get('/paises', VerPaises::class)
        ->name('ver-paises');

    Route::get('/departamentos', VerDepartamentos::class)
        ->name('ver-departamentos');

    Route::get('/ciudades', VerCiudades::class)
        ->name('ver-ciudades');


    // ---------------- Mobiliarios ----------------

    Route::get('/mobiliarios', VerMobiliarios::class)
        ->name('ver-mobiliarios');

    Route::get('/categorias', VerCategorias::class)
        ->name('ver-categorias');

    Route::get('/subcategorias', VerSubCategorias::class)
        ->name('ver-sub-categorias');


    // ---------------- Articulos ----------------

    Route::get('/articulos', VerArticulos::class)
        ->name('ver-articulos');

    Route::get('/categoria-articulos', VerCategoriaArticulos::class)
        ->name('ver-categoria-articulos');


    // ---------------- Donaciones ----------------

    Route::get('/tipodonantes', VerTipoDonantes::class)
        ->name('ver-tipo-donantes');

    Route::get('/donantes', VerDonantes::class)
        ->name('ver-donantes');

    Route::get('/listar-donaciones', VerDonaciones::class)
        ->name('ver-donaciones');

    Route::get('/crear-donacion', CrearDonaciones::class)
        ->name('crear-donacion');

    Route::get('/donaciones', DonacionPage::class)
        ->name('donaciones');


    // ---------------- Actas ----------------

    Route::get('/actas', ActasOptions::class)
        ->name('actas');


    // ---------------- Actas de Entrega ----------------

    Route::get('/listado-actas-entrega', VerActasEntrega::class)
        ->name('ver-actas-entrega');

    Route::get('/crear-acta-entrega', CrearActaEntrega::class)
        ->name('crear-acta-entrega');

    Route::get('/info-acta-entrega', InfoActaEntrega::class)
        ->name('info-acta-entrega');

    Route::get('/actas-entrega', ActasEntregaPage::class)
        ->name('actas-entrega-page');


    // ---------------- Solicitudes de Traslado ----------------

    Route::get('/solicitudes-traslado', SolicitudesTrasladoPage::class)
        ->name('solicitudes-traslado-page');

    Route::get('/listado-solicitudes-traslado', VerSolicitudesTraslado::class)
        ->name('ver-solicitudes-traslado');

    Route::get('/crear-solicitud-traslado', CrearSolicitudTraslado::class)
        ->name('crear-solicitud-traslado');

    Route::get('/info-solicitud-traslado', InfoSolicitudTraslado::class)
        ->name('info-solicitud-traslado');


    // ---------------- Solicitudes de Insumos ----------------

    Route::get('/solicitudes-insumos', SolicitudesInsumosPage::class)
        ->name('solicitudes-insumos-page');

    Route::get('/listado-solicitudes-insumos', VerSolicitudesInsumos::class)
        ->name('ver-solicitudes-insumos');

    Route::get('/solicitud-insumo', InfoSolicitudInsumo::class)
        ->name('info-solicitud-insumos');

    Route::get('/crear-solicitud-insumos', CrearSolicitudInsumos::class)
        ->name('crear-solicitud-insumos');


    // ---------------- Reporteria ----------------

    Route::get('/reporte-mensual', ReporteMensual::class)
        ->name('reporte-mensual');

    Route::get('/reportes', Reportes::class)
        ->name('reportes');

    Route::get('/reporte-articulos', ReporteArticulo::class)
        ->name('reporte-articulos');
});


// Route::get('/detalle-solicitud-traslado/{id}', InfoSolicitudTraslado::class)
//     ->name('detalle-solicitud-traslado')
//     ->middleware('auth');

// Route::get('/detalle-solicitud-insumo/{id}', InfoSolicitudInsumo::class)
//     ->name('detalle-solicitud-insumo')
//     ->middleware('auth');
