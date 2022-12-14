<?php
use App\Http\Livewire\EquipoTelecos;
use App\Http\Livewire\TelecoForm;
use App\Http\Livewire\TelecoShow;
use App\Http\Livewire\GestionTelecos;
use App\Http\Livewire\TelecoTable;

use App\Http\Livewire\EquipoComputos\ComputoForm;
use App\Http\Livewire\EquipoComputos\EquipoComputos;
use App\Http\Livewire\EquipoComputos\ComputoShow;
use App\Http\Livewire\EquipoComputos\ComputoTable;
use App\Http\Livewire\EquipoComputos\GestionComputos;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
 
    //rutas de telecomunicaiones
    Route::get('/Equipo-Teleco/index',EquipoTelecos::class)->name('EquipoT.index');
    Route::get('/Equipo-Teleco/create',TelecoForm::class)->name('EquipoT.create');
    Route::get('/Equipo-Teleco/{EquipoTeleco}',TelecoShow::class)->name('EquipoT.show');
    Route::get('/Equipo-Teleco/{equipoTeleco:id}/edit',TelecoForm::class)->name('EquipoT.edit');
    Route::get('/Gestion-Teleco/create',GestionTelecos::class)->name('GestionT.create');
    Route::get('/Gestion-Teleco/table',TelecoTable::class)->name('GestionT.table');
    Route::get('/Gestion-Teleco/{GestionTelecos:id}',GestionTelecos::class)->name('GestionT.edit');
 
    // rutas de infraextructura tecnologica
     Route::get('/Equipo-computos/index',EquipoComputos::class)->name('EquipoC.index');
    Route::get('/Equipo-Infraestructura/create',ComputoForm::class)->name('EquipoC.create');
    Route::get('/Equipo-Infraestructura/{equipoComputo}',ComputoShow::class)->name('EquipoC.show');
    Route::get('/Equipo-Infraestrutura/{equipoComputo:id}/edit',ComputoForm::class)->name('EquipoC.edit');
    Route::get('/Gestion-Infraestrutura/create',GestionTelecos::class)->name('GestionC.create');
    Route::get('/Gestion-Infraestrutura/table',ComputoTable::class)->name('GestionC.table');
    Route::get('/Gestion-Teleco/{gestionTelecos:id}',GestionComputos::class)->name('GestionC.edit');
   
   
   
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

