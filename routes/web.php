<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Crud\Departamentos\VerDepartamentos;
use App\Livewire\Crud\Paises\VerPaises;
use App\Livewire\Pages\Administracion;

Route::get('/', Dashboard::class);

Route::get('/migrantes', Dashboard::class)->name('ver-migrantes');

Route::get('/administracion', Administracion::class)->name('administracion-general');

Route::get('/paises', VerPaises::class)->name('ver-paises');
Route::get('/departamentos', VerDepartamentos::class)->name('ver-departamentos');
