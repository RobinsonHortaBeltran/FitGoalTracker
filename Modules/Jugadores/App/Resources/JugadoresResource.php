<?php
namespace Modules\Jugadores\App\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Jugadores\App\Models\ModelJugador;

class JugadoresResource extends JsonResource
{
    protected $message;

    public function __construct($resource, $message)
    {
        parent::__construct($resource);
        $this->message = $message;
    }


    public function toArray($request): array
    {
        return [
            'Message' => $this->message,
            'data' =>$this->resource,
            'status' => true,
            'code' => 200,
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)
            ->header('Content-Type', 'application/json')
            ->header('Custom-Header', 'Value');
    }

}
