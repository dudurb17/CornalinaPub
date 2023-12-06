<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EventoController;

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



});

require __DIR__.'/auth.php';