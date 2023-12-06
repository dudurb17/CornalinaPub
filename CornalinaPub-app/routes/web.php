<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\IngressoController;
use App\Http\Controllers\LoteIngressoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/chart', [StatisticController::class, 'index'])->name('estatistic.index');


    // Rotas para EmpresaController

    Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index');;
    Route::get('/empresas/create', [EmpresaController::class, 'create'])->name("empresas.create");
    Route::post('/empresas/store', [EmpresaController::class, 'store'])->name("empresas.store");
    Route::get('/empresas/edit/{id}', [EmpresaController::class, 'edit'])->name('empresas.edit');
    Route::put('/empresas/update/{id}', [EmpresaController::class, 'update'])->name("empresas.update");
    Route::get('/empresas/delete/{id}', [EmpresaController::class, 'destroy'])->name("empresas.destroy");
    Route::post('/empresas/search',
    [EmpresaController::class, 'search'])->name('empresas.search');
    Route::get('/empresaEvent/{id}',
    [EmpresaController::class, 'listEventos'])->name('eventoEmpresa.list');


    //Rota eventos
    Route::get('/eventos', [EventoController::class, 'index'])->name('evento.index');
    Route::get('/eventos/create',[EventoController::class,'create'])->name('evento.create');
    Route::get('/eventos/edit/{id}', [EventoController::class, 'edit'])->name('evento.edit');
    Route::post('/eventos', [EventoController::class, 'store'])->name('evento.store');
    Route::post('/eventos/update/{id}',
    [EventoController::class, 'update'])->name('evento.update');
    Route::get('/evento/edit/{id}',
    [EventoController::class, 'edit'])->name('evento.edit');
    Route::get('/evento/destroy/{id}',
    [EventoController::class, 'destroy'])->name('evento.destroy');
    Route::post('/evento/search',
    [EventoController::class, 'search'])->name('evento.search');
 //relatorio
 Route::get('/eventos/report/',
 [EventoController::class, 'report'])->name('evento.report');

// Rotas para Ingresso
Route::get('/ingresso', [IngressoController::class, 'index'])->name('ingresso.index');
Route::get('/ingresso/create', [IngressoController::class, 'create'])->name('ingresso.create');
Route::get('/ingresso/edit/{id}', [IngressoController::class, 'edit'])->name('ingresso.edit');
Route::post('/ingresso', [IngressoController::class, 'store'])->name('ingresso.store');
Route::post('/ingresso/update/{id}', [IngressoController::class, 'update'])->name('ingresso.update');
Route::get('/ingresso/destroy/{id}', [IngressoController::class, 'destroy'])->name('ingresso.destroy');
Route::post('/ingresso/search',
[IngressoController::class, 'search'])->name('ingresso.search');

// routes/web.php

Route::get('/lote', [LoteIngressoController::class, 'index'])->name('lote.index');
Route::post('/lotes', [LoteIngressoController::class, 'search'])->name('lote.search');
Route::get('/lote/create', [LoteIngressoController::class, 'create'])->name('lote.create');
Route::get('/lote/edit/{id}', [LoteIngressoController::class, 'edit'])->name('lote.edit');
Route::get('/lote/destroy/{id}', [LoteIngressoController::class, 'destroy'])->name('lote.destroy');
Route::post('/lote/update/{id}', [LoteIngressoController::class, 'update'])->name('lote.update');
Route::post('/lote/store', [LoteIngressoController::class, 'store'])->name('lote.store');

});

require __DIR__.'/auth.php';
