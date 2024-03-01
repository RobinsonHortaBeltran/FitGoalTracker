<?php

namespace Modules\Equipos\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Equipos\Database\factories\ModelEquipoFactory;

class ModelEquipo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['nombre', 'descripcion', 'director', 'estado'];
    protected $table = 'equipos';

    protected static function newFactory()
    {

    }
}
