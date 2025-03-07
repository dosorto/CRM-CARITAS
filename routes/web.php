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
use App\Livewire\Crud\Migrantes\SalidaMigrante\RegistrarSalidaMigrante;
use App\Livewire\Crud\Necesidades\VerNecesidades;
use App\Livewire\Crud\MotivoSalida\VerMotivos;
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
use App\Livewire\Crud\Migrantes\VerExpediente;
use App\Livewire\Crud\Roles\VerRoles;
use App\Livewire\Crud\Usuarios\VerUsuarios;

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

    Route::get('/listado-migrantes', VerMigrantes::class)
        ->middleware('can:ver-migrantes')
        ->name('ver-migrantes');

    Route::get('/migrantes', MigrantesOptions::class)
        ->middleware('can:ver-migrantes')
        ->name('migrantes');

    Route::get('/registrar-migrante', RegistrarMigrante::class)
        ->middleware('can:registrar-migrantes')
        ->name('registrar-migrante');

    Route::get('/registrar-salida-migrante/{migranteId}', RegistrarSalidaMigrante::class)
        ->middleware('can:registrar-salida-de-migrante')
        ->name('registrar-salida-migrante');

    // ---------------- Expedientes de Migrantes ----------------

    Route::get('/ver-expediente/{expedienteId?}', VerExpediente::class)
        ->middleware('can:ver-migrantes')
        ->name('ver-expediente');

    Route::get('/discapacidades', VerDiscapacidades::class)
        ->middleware('can:ver-discapacidades')
        ->name('ver-discapacidades');

    Route::get('/necesidades', VerNecesidades::class)
        ->middleware('can:ver-necesidades')
        ->name('ver-necesidades');

    Route::get('/motivos', VerMotivos::class)
        ->name('ver-motivos');

    Route::get('/situaciones-migratorias', VerSituacionesMigratorias::class)
        ->middleware('can:ver-situaciones-migratorias')
        ->name('ver-situaciones-migratorias');

    Route::get('/asesores-migratorios', VerAsesoresMigratorios::class)
        ->middleware('can:ver-asesores-migratorios')
        ->name('ver-asesores-migratorios');

    Route::get('/fronteras', VerFronteras::class)
        ->middleware('can:ver-fronteras')
        ->name('ver-fronteras');

    Route::get('/faltas-disciplinarias', VerFaltas::class)
        ->middleware('can:ver-faltas-disciplinarias')
        ->name('ver-faltas');

    Route::get('/historial/{migranteId}', HistorialMigrante::class)
        ->middleware('can:ver-migrantes')
        ->name('ver-historial');


    // ---------------- Usuarios ----------------

    Route::get('/usuarios', VerUsuarios::class)
        ->middleware('can:ver-usuarios')
        ->name('ver-usuarios');

    Route::get('/roles', VerRoles::class)
        ->middleware('can:ver-roles')
        ->name('ver-roles');


    // ---------------- Manteminiento General ----------------

    Route::get('/administracion', Administracion::class)
        ->name('administracion');


    // ---------------- Localizaciones ----------------

    Route::get('/paises', VerPaises::class)
        ->middleware('can:ver-paises')
        ->name('ver-paises');

    Route::get('/departamentos', VerDepartamentos::class)
        ->middleware('can:ver-departamentos')
        ->name('ver-departamentos');

    Route::get('/ciudades', VerCiudades::class)
        ->middleware('can:ver-ciudades')
        ->name('ver-ciudades');


    // ---------------- Mobiliarios ----------------

    Route::get('/mobiliarios', VerMobiliarios::class)
        ->middleware('can:ver-mobiliarios')
        ->name('ver-mobiliarios');

    Route::get('/categorias', VerCategorias::class)
        ->middleware('can:ver-categorias-de-mobiliarios')
        ->name('ver-categorias');

    Route::get('/subcategorias', VerSubCategorias::class)
        ->middleware('can:ver-sub-categorias-de-mobiliarios')
        ->name('ver-sub-categorias');


    // ---------------- Articulos ----------------

    Route::get('/articulos', VerArticulos::class)
        ->middleware('can:ver-articulos')
        ->name('ver-articulos');

    Route::get('/categoria-articulos', VerCategoriaArticulos::class)
        ->middleware('can:ver-categorias-de-articulos')
        ->name('ver-categoria-articulos');


    // ---------------- Donaciones ----------------

    Route::get('/tipodonantes', VerTipoDonantes::class)
        ->middleware('can:ver-tipos-de-donantes')
        ->name('ver-tipo-donantes');

    Route::get('/donantes', VerDonantes::class)
        ->middleware('can:ver-donantes')
        ->name('ver-donantes');

    Route::get('/listar-donaciones', VerDonaciones::class)
        ->middleware('can:ver-donaciones')
        ->name('ver-donaciones');

    Route::get('/crear-donacion', CrearDonaciones::class)
        ->middleware('can:crear-donaciones')
        ->name('crear-donacion');

    Route::get('/donaciones', DonacionPage::class)
        ->middleware('can:ver-donaciones')
        ->name('donaciones');


    // ---------------- Actas ----------------

    Route::get('/actas', ActasOptions::class)
        ->middleware('can:ver-actas-de-entrega|ver-solicitudes-de-traslado|ver-solicitudes-de-insumos')
        ->name('actas');

    Route::get('/ver-solicitudes-pendientes', VerSolicitudesPendientes::class)
        ->middleware('can:autorizar-solicitudes-pendientes')
        ->name('ver-solicitudes-pendientes');


    // ---------------- Actas de Entrega ----------------

    Route::get('/listado-actas-entrega', VerActasEntrega::class)
        ->middleware('can:ver-actas-de-entrega')
        ->name('ver-actas-entrega');

    Route::get('/crear-acta-entrega', CrearActaEntrega::class)
        ->middleware('can:crear-actas-de-entrega')
        ->name('crear-acta-entrega');

    Route::get('/info-acta-entrega', InfoActaEntrega::class)
        ->middleware('can:ver-actas-de-entrega')
        ->name('info-acta-entrega');

    Route::get('/actas-entrega', ActasEntregaPage::class)
        ->middleware('can:ver-actas-de-entrega')
        ->name('actas-entrega-page');


    // ---------------- Solicitudes de Traslado ----------------

    Route::get('/solicitudes-traslado', SolicitudesTrasladoPage::class)
        ->middleware('can:ver-solicitudes-de-traslado')
        ->name('solicitudes-traslado-page');

    Route::get('/listado-solicitudes-traslado', VerSolicitudesTraslado::class)
        ->middleware('can:ver-solicitudes-de-traslado')
        ->name('ver-solicitudes-traslado');

    Route::get('/crear-solicitud-traslado', CrearSolicitudTraslado::class)
        ->middleware('can:crear-solicitudes-de-traslado')
        ->name('crear-solicitud-traslado');

    Route::get('/info-solicitud-traslado', InfoSolicitudTraslado::class)
        ->middleware('can:ver-solicitudes-de-traslado')
        ->name('info-solicitud-traslado');


    // ---------------- Solicitudes de Insumos ----------------

    Route::get('/solicitudes-insumos', SolicitudesInsumosPage::class)
        ->middleware('can:ver-solicitudes-de-insumos')
        ->name('solicitudes-insumos-page');

    Route::get('/listado-solicitudes-insumos', VerSolicitudesInsumos::class)
        ->middleware('can:ver-solicitudes-de-insumos')
        ->name('ver-solicitudes-insumos');

    Route::get('/solicitud-insumo', InfoSolicitudInsumo::class)
        ->middleware('can:ver-solicitudes-de-insumos')
        ->name('info-solicitud-insumos');

    Route::get('/crear-solicitud-insumos', CrearSolicitudInsumos::class)
        ->middleware('can:crear-solicitudes-de-insumos')
        ->name('crear-solicitud-insumos');


    // ---------------- Reporteria ----------------

    Route::get('/reporte-mensual', ReporteMensual::class)
        ->middleware('can:generar-reportes-de-migrantes')
        ->name('reporte-mensual');

    Route::get('/reportes', Reportes::class)
        ->middleware('can:generar-reportes-de-migrantes')
        ->name('reportes');

    // Route::get('/reporte-articulos', ReporteArticulo::class)
    //     ->name('reporte-articulos');
});


// Route::get('/detalle-solicitud-traslado/{id}', InfoSolicitudTraslado::class)
//     ->name('detalle-solicitud-traslado')
//     ->middleware('auth');

// Route::get('/detalle-solicitud-insumo/{id}', InfoSolicitudInsumo::class)
//     ->name('detalle-solicitud-insumo')
//     ->middleware('auth');
