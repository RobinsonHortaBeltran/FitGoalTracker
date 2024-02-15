<?php
namespace Modules\Jugadores\App\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Jugadores\App\Models\ModelJugador;

class JugadoresResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'Message' => 'Listado de jugadores',
            'data' => ModelJugador::all(),
            'status' => true,
            'code' => 200,
        ];
    }
}
