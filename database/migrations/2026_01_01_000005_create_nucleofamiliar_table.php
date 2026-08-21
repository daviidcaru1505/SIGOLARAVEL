<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nucleofamiliar', function (Blueprint $table) {
            $table->unsignedInteger('idNucleoFamiliar')->primary();
            $table->unsignedInteger('idUsuario');
            $table->unsignedInteger('idEncuesta');
            $table->tinyInteger('JefeHogar');

            $table->foreign('idUsuario')->references('idUsuario')->on('usuario');
            $table->foreign('idEncuesta')->references('idEncuesta')->on('encuesta');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nucleofamiliar');
    }
};
