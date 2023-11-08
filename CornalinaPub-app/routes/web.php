<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

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
    Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index');
    Route::get('/empresas/{id}', [EmpresaController::class, 'show'])->name('empresas.show');

    Route::get('/empresas/create', [EmpresaController::class, 'create'])->name('empresas.create');
    Route::post('/empresas', [EmpresaController::class, 'store'])->name('empresas.store');

    Route::get('/empresas/{id}/edit', [EmpresaController::class, 'edit'])->name('empresas.edit');
    Route::put('/empresas/{id}', [EmpresaController::class, 'update'])->name('empresas.update');

    Route::delete('/empresas/{id}', [EmpresaController::class, 'destroy'])->name('empresas.destroy');

    // Rota de pesquisa
    Route::post('/empresas/search', [EmpresaController::class, 'search'])->name('empresas.search');

});

require __DIR__.'/auth.php';
