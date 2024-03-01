<?php

namespace Modules\Entrenadores\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Entrenadores\App\Models\ModelEntrenador;

class EntrenadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(
            [
                'message' => 'Listado de entrenadores',
                'data' => ModelEntrenador::all(),
                'success' => true,
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
       $validarEntrenador = $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'especialidad' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);

        if ($validarEntrenador) {

            $entrenador = ModelEntrenador::create($validarEntrenador);
            return response()->json(
                [
                    'message' => 'Entrenador creado correctamente',
                    'data' => $entrenador,
                    'success' => true,
                ],
                200
            );
        }

    }

    /**
     * Show the specified resource.
     */
    public function show($id): JsonResponse
    {
        $existEntrenador = ModelEntrenador::find($id);
        if (!$existEntrenador) {
            return response()->json(
                [
                    'message' => 'Entrenador no encontrado',
                    'success' => false,
                ],
                404
            );
        }

        return response()->json(
            [
                'message' => 'Entrenador encontrado',
                'data' => ModelEntrenador::find($id),
                'success' => true,
            ],
            200
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $validarEntrenador = $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'especialidad' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);

        if ($validarEntrenador) {
            $entrenador = ModelEntrenador::find($id);
            if (!$entrenador) {
                return response()->json(
                    [
                        'message' => 'Entrenador no encontrado',
                        'success' => false,
                    ],
                    404
                );
            }

            $entrenador->update($validarEntrenador);
            return response()->json(
                [
                    'message' => 'Entrenador actualizado correctamente',
                    'data' => $entrenador,
                    'success' => true,
                ],
                200
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $entrenador = ModelEntrenador::find($id);
        if (!$entrenador) {
            return response()->json(
                [
                    'message' => 'Entrenador no encontrado',
                    'success' => false,
                ],
                404
            );
        }

        $entrenador->delete();
        return response()->json(
            [
                'message' => 'Entrenador eliminado correctamente',
                'success' => true,
            ],
            200
        );
    }
}
