<?php

namespace Modules\Jugadores\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Equipos\App\Models\ModelEquipo;

class ModelJugador extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'edad',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'telefono',
        'direccion',
        'email',
        'sexo',
        'estado_civil',
        'tipo_documento',
        'nro_documento',
        'nro_camiseta',
        'foto',
        'peso',
        'altura',
        'nacionalidad',
        'equipo',
        'posicion',
        'pierna_habil',
        'fecha_ingreso',
        'fecha_salida',
        'observaciones',
        'estado',
        'estado_jugador',
        'potencia',
        'velocidad',
        'resistencia',
        'habilidad',
        'tecnica',
        'tactica',
        'fuerza',
        'flexibilidad',
        'coordinacion',
        'equilibrio',
        'agilidad',
    ];

    protected $table = 'jugadores';

    protected static function newFactory()
    {

    }

    public function equipo()
    {
        return $this->belongsTo(ModelEquipo::class, 'equipo', 'id');
    }
}
