<?php

namespace Modules\Equipos\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Equipos\App\Models\ModelEquipo;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(
            [
                'data' => ModelEquipo::all(),
                'message' => '',
                'success' => true
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validarEquipo = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'director' => 'required',
            'estado' => 'required'
        ]);

        $existente = ModelEquipo::where('nombre', $validarEquipo['nombre'])->exists();
        if (!$existente) {
            $equipo = ModelEquipo::create($validarEquipo);
            return response()->json(
                [
                    'data' => $equipo,
                    'message' => 'Equipo creado correctamente',
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'data' => null,
                    'message' => 'El equipo ya existe',
                    'success' => false
                ]
            );
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id): JsonResponse
    {
        if ($id) {
            $equipo = ModelEquipo::find($id);
            if ($equipo) {
                return response()->json(
                    [
                        'data' => $equipo,
                        'message' => 'Equipo encontrado correctamente',
                        'success' => true
                    ]
                );
            } else {
                return response()->json(
                    [
                        'data' => null,
                        'message' => 'Equipo no encontrado',
                        'success' => false
                    ]
                );
            }
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $validarEquipo = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'director' => 'required',
            'estado' => 'required'
        ]);

        $equipo = ModelEquipo::find($id);
        if ($equipo) {
            $equipo->update($validarEquipo);
            return response()->json(
                [
                    'data' => $equipo,
                    'message' => 'Equipo actualizado correctamente',
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'data' => null,
                    'message' => 'Equipo no encontrado',
                    'success' => false
                ]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $equipo = ModelEquipo::find($id);
        if ($equipo) {
            $equipo->delete();
            return response()->json(
                [
                    'data' => null,
                    'message' => 'Equipo eliminado correctamente',
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'data' => null,
                    'message' => 'Equipo no encontrado',
                    'success' => false
                ]
            );
        }
    }

    public function jugadores($id): JsonResponse
    {
        $equipo = ModelEquipo::with('jugadores')->find($id);

        if (!$equipo) {
            return response()->json(['mensaje' => 'Equipo no encontrado'], 404);
        }

        return response()->json(['jugadores' => $equipo, 'message' => 'Jugadores encontrados correctamente', 'success' => true]);
    }
}
