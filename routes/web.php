<?php

use App\Http\Controllers\{GrupoController, PublicadorController};
use Illuminate\Support\Facades\Route;

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

Route::get('/publicador', [PublicadorController::class, 'index'])->name('publicador.index');

Route::get('/publicador/create', [PublicadorController::class, 'create'])->name('publicador.create');

Route::post('/publicador', [PublicadorController::class, 'store'])->name('publicador.store');

Route::get('/publicador/{id}', [PublicadorController::class, 'show'])->name('publicador.show');

Route::get('/publicador/{id}/edit', [PublicadorController::class, 'edit'])->name('publicador.edit');

Route::put('/publicador/{id}', [PublicadorController::class, 'update'])->name('publicador.update');

Route::delete('publicador/{id}', [PublicadorController::class, 'destroy'])->name('publicador.destroy');