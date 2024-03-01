<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  Modules\Jugadores\App\Http\Controllers\JugadoresController;

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


Route::middleware(['auth:api'])->prefix('v1')->name('api.')->group(function () {
    Route::resource('jugadores', JugadoresController::class)->only([
        'index', 'store', 'update'
    ])->names([
        'index' => 'jugadores.index',
        'store' => 'jugadores.store',
        'update' => 'jugadores.update',
    ]);
});
