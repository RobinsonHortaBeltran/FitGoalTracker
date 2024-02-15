<?php

namespace Modules\Jugadores\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Jugadores\App\Models\ModelJugador;
use Modules\Jugadores\App\Resources\JugadoresResource;

class JugadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'Message' => 'Listado de jugadores',
            'data' => ModelJugador::all(),
            'status' => true,
            'code' => 200,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validateData = $request->validate([
                'nombre' => 'required',
                'apellido' => 'required',
                'telefono' => 'required',
                'email' => 'required',
                'clave' => 'required',
            ]);

            if ($validateData) {
                $jugador = new ModelJugador;
                $jugador->create($request->all());

                return response()->json([
                    'Message' => 'Jugador creado correctamente',
                    'data' => $jugador,
                    'status' => true,
                    'code' => 200,
                ]);

            } else {
                return response()->json([
                    'Message' => 'Error al crear el jugador',
                    'data' => $validateData,
                    'status' => false,
                    'code' => 500,
                ]);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'Message' => 'Error al crear el jugador',
                'data' => $th->getMessage(),
                'status' => false,
                'code' => 500,
            ]);
        }
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $buscarJugador = ModelJugador::find($id);
        if ($buscarJugador) {
            return response()->json([
                'Message' => 'Jugador encontrado',
                'data' => $buscarJugador,
                'status' => true,
                'code' => 200,
            ]);
        } else {
            return response()->json([
                'Message' => 'Jugador no encontrado',
                'data' => $buscarJugador,
                'status' => false,
                'code' => 404,
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $jugador = ModelJugador::find($id);
            if ($jugador) {
                $jugador->update($request->all());
                return response()->json([
                    'Message' => 'Jugador actualizado correctamente',
                    'data' => $jugador,
                    'status' => true,
                    'code' => 200,
                ]);
            } else {
                return response()->json([
                    'Message' => 'Jugador no encontrado',
                    'data' => $jugador,
                    'status' => false,
                    'code' => 404,
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'Message' => 'Error al actualizar el jugador',
                'data' => $th->getMessage(),
                'status' => false,
                'code' => 500,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jugador = ModelJugador::find($id);
        if ($jugador) {
            $jugador->delete();
            return response()->json([
                'Message' => 'Jugador eliminado correctamente',
                'data' => $jugador,
                'status' => true,
                'code' => 200,
            ]);
        } else {
            return response()->json([
                'Message' => 'Jugador no encontrado',
                'data' => $jugador,
                'status' => false,
                'code' => 404,
            ]);
        }
    }
}
