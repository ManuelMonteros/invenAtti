<?php
use App\Http\Livewire\EquipoTelecos;
use App\Http\Livewire\TelecoForm;
use App\Http\Livewire\TelecoShow;
use App\Models\EquipoTeleco;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/Equipo-Teleco/index',EquipoTelecos::class)->name('EquipoT.index');
    Route::get('/Equipo-Teleco/create',TelecoForm::class)->name('EquipoT.create');
    Route::get('/Equipo-Teleco/{EquipoTeleco}',TelecoShow::class)->name('EquipoT.show');
    Route::get('/Equipo-Teleco/{equipoTeleco:id}/edit',TelecoForm::class)->name('EquipoT.edit');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

