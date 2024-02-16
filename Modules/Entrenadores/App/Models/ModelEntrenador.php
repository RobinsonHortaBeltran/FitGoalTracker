<?php

namespace Modules\Entrenadores\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Entrenadores\Database\factories\ModelEntrenadorFactory;

class ModelEntrenador extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['nombre', 'apellidos', 'email', 'telefono', 'especialidad', 'imagen', 'descripcion', 'estado'];
    protected $table = 'entrenadores';
    protected static function newFactory()
    {
        //return ModelEntrenadorFactory::new();
    }
}
