<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Crud\Categorias\VerCategorias;
use App\Livewire\Crud\Ciudades\VerCiudades;
use App\Livewire\Crud\Departamentos\VerDepartamentos;
use App\Livewire\Crud\Paises\VerPaises;
use App\Livewire\Pages\Administracion;
use App\Livewire\Crud\SubCategorias\VerSubCategorias;

Route::get('/', Dashboard::class);

Route::get('/migrantes', Dashboard::class)->name('ver-migrantes');

Route::get('/administracion', Administracion::class)->name('administracion-general');

Route::get('/paises', VerPaises::class)->name('ver-paises');

Route::get('/departamentos', VerDepartamentos::class)->name('ver-departamentos');

Route::get('/ciudades', VerCiudades::class)->name('ver-ciudades');

Route::get('/categorias', VerCategorias::class)->name('ver-categorias');

Route::get('/subcategorias', VerSubCategorias::class)->name('ver-sub-categorias');


Route::get('/testing', function() {return '<div class="dropdown">

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
</script>';});
