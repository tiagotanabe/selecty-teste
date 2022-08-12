<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatosController;
use App\Http\Controllers\ExperienciasController;
use App\Http\Controllers\AcademicasController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('candidatos')->group(function() {
    Route::get('/', [CandidatosController::class, 'index'])->name('candidatos-index');
    Route::get('create', [CandidatosController::class, 'create'])->name('candidatos-create');
    Route::post('/', [CandidatosController::class, 'store'])->name('candidatos-store');
    Route::post('/{id}/edit', [CandidatosController::class, 'edit'])->where('id', '[0-9]+')->name('candidatos-edit');
    Route::put('/{id}', [CandidatosController::class, 'update'])->where('id', '[0-9]+')->name('candidatos-update');
    Route::delete('/{id}', [CandidatosController::class, 'destroy'])->where('id', '[0-9]+')->name('candidatos-destroy');
    Route::get('/{id}/usuariocreate', [CandidatosController::class, 'usuariocreate'])->where('id', '[0-9]+')->name('usuario-create');
    Route::post('/{id}/usuariostore', [CandidatosController::class, 'usuariostore'])->name('usuario-store');
});

Route::prefix('experiencias')->group(function() {
    Route::get('/{id}/index', [ExperienciasController::class, 'index'])->where('id', '[0-9]+')->name('experiencias-index');;
    Route::get('/{id}/create', [ExperienciasController::class, 'create'])->where('id', '[0-9]+')->name('experiencias-create');
    Route::post('/{id}/edit', [ExperienciasController::class, 'edit'])->where('id', '[0-9]+')->name('experiencias-edit');
    Route::post('/', [ExperienciasController::class, 'store'])->name('experiencias-store');
    Route::get('novaexperiencia', [ExperienciasController::class, 'novaexperiencia'])->name('nova-experiencia');
    Route::put('/{id}', [ExperienciasController::class, 'update'])->where('id', '[0-9]+')->name('experiencias-update');
    Route::delete('/{idCandidato}/{id}', [ExperienciasController::class, 'destroy'])->where('id', '[0-9]+')->name('experiencias-destroy');
});

Route::prefix('academicas')->group(function() {
    Route::get('/{id}/index', [AcademicasController::class, 'index'])->where('id', '[0-9]+')->name('academicas-index');;
    Route::get('/{id}/create', [AcademicasController::class, 'create'])->where('id', '[0-9]+')->name('academicas-create');
    Route::post('/{id}/edit', [AcademicasController::class, 'edit'])->where('id', '[0-9]+')->name('academicas-edit');
    Route::post('/', [AcademicasController::class, 'store'])->name('academicas-store');
    Route::get('novaacademicas', [AcademicasController::class, 'novaacademicas'])->name('nova-academicas');
    Route::put('/{id}', [AcademicasController::class, 'update'])->where('id', '[0-9]+')->name('academicas-update');
    Route::delete('/{idCandidato}/{id}', [AcademicasController::class, 'destroy'])->where('id', '[0-9]+')->name('academicas-destroy');
});
