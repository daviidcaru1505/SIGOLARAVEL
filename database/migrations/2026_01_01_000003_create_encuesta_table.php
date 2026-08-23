<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('encuesta', function (Blueprint $table) {
            $table->increments('idEncuesta');
            
            // Relación con la tabla usuario (idUsuario)
            $table->unsignedInteger('idUsuario');
            
            $table->string('FechaCreacion', 45);
            $table->string('Estado', 45);
            $table->string('Soporte', 45);
            $table->string('NivelSocioeconomico', 3)->nullable();

            // Clave foránea
            $table->foreign('idUsuario')
                  ->references('idUsuario')
                  ->on('usuario')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('encuesta');
    }
};