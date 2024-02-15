<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('edad')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('lugar_nacimiento')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('email')->nullable();
            $table->string('sexo')->nullable();
            $table->enum('estado_civil', ['soltero', 'casado', 'divorciado', 'viudo'])->default('soltero');
            $table->string('tipo_documento')->nullable();
            $table->string('nro_documento')->nullable();
            $table->string('nro_camiseta')->nullable();
            $table->string('foto')->nullable();
            $table->string('peso')->nullable();
            $table->string('altura')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('equipo')->nullable();
            $table->string('posicion')->nullable();
            $table->string('pierna_habil')->nullable();
            $table->string('fecha_ingreso')->nullable();
            $table->string('fecha_salida')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('estado')->nullable();
            $table->string('estado_jugador')->nullable();
            $table->string('potencia')->nullable();
            $table->string('velocidad')->nullable();
            $table->string('resistencia')->nullable();
            $table->string('habilidad')->nullable();
            $table->string('tecnica')->nullable();
            $table->string('tactica')->nullable();
            $table->string('fuerza')->nullable();
            $table->string('flexibilidad')->nullable();
            $table->string('coordinacion')->nullable();
            $table->string('equilibrio')->nullable();
            $table->string('agilidad')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};
