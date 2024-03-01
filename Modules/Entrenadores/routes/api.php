<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Entrenadores\App\Http\Controllers\EntrenadoresController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/
Route::middleware(['auth:api'])->prefix('v1/entrenador')->name('api.')->group(function () {

    Route::get('/', [EntrenadoresController::class, 'index'])->name('entrenador.index');
    Route::post('/', [EntrenadoresController::class, 'store'])->name('entrenador.store');
    Route::get('/{id}', [EntrenadoresController::class, 'show'])->name('entrenador.show');
    Route::put('/{id}', [EntrenadoresController::class, 'update'])->name('entrenador.update');
    Route::delete('/{id}', [EntrenadoresController::class, 'destroy'])->name('entrenador.destroy');
    Route::get('/equipo/{id}', [EntrenadoresController::class, 'jugadores'])->name('entrenador.equipo');

});
