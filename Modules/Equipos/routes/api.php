<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Equipos\App\Http\Controllers\EquiposController;

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
Route::middleware(['auth:api'])->prefix('v1/equipo')->name('api.')->group(function () {

    Route::get('/', [EquiposController::class, 'index'])->name('equipo.index');
    Route::post('/store', [EquiposController::class, 'store'])->name('equipo.store');
    Route::get('/{id}', [EquiposController::class, 'show'])->name('equipo.show');
    Route::put('/{id}', [EquiposController::class, 'update'])->name('equipo.update');
    Route::delete('/{id}', [EquiposController::class, 'destroy'])->name('equipo.destroy');
    Route::get('/jugadores/{id}', [EquiposController::class, 'jugadores'])->name('equipo.jugadores');


});
