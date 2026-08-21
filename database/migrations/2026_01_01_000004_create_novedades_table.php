<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('novedades', function (Blueprint $table) {
            $table->unsignedInteger('idNovedades')->primary();
            $table->unsignedInteger('idEncuesta');
            $table->string('TipoNovedad', 45);
            $table->string('Descripcion', 45);
            $table->dateTime('Fecha');
            $table->string('Estado', 45);

            $table->foreign('idEncuesta')->references('idEncuesta')->on('encuesta');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('novedades');
    }
};
