<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Crud\Articulos\VerArticulos;
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

Route::get('/inicio', Dashboard::class)
    ->middleware('auth');

Route::get('/migrantes', VerMigrantes::class)
    ->name('ver-migrantes')
    ->middleware('auth');;

Route::get('/registrar-migrante', RegistrarMigrante::class)->name('registrar-migrante');

Route::get('/administracion', Administracion::class)
    ->name('administracion-general')
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
    ->name('ver-categorias');

Route::get('/subcategorias', VerSubCategorias::class)
    ->name('ver-sub-categorias');

Route::get('/mobiliarios', VerMobiliarios::class)->name('ver-mobiliarios');
Route::get('/formularios', VerFormularios::class)->name('ver-formulario');

Route::get('/articulos', VerArticulos::class)->name('ver-articulos');


Route::post('/logout', function () {
    FacadesAuth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/'); // Redirecciona a la página de login
})->name('logout');

Route::get('/testing', function () {
    return '<div class="dropdown">

    <div id="paises" class="dropdown-content">
        <input type="text" placeholder="Search.." id="searching" onkeyup="filterFunction()">
        <a href="#about">About</a>
        <a href="#base">Base</a>
        <a href="#blog">Blog</a>
        <a href="#contact">Contact</a>
        <a href="#custom">Custom</a>
        <a href="#support">Support</a>
        <a href="#tools">Tools</a>
    </div>
</div>
<script>

    function filterFunction() {
        const input = document.getElementById("searching");
        const filter = input.value.toUpperCase();
        const div = document.getElementById("paises");
        const a = div.getElementsByTagName("a");
        for (let i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].inn erText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
</script>';
});
