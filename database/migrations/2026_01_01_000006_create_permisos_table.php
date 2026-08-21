<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->unsignedInteger('idPermisos')->primary();
            $table->unsignedInteger('idRol');
            $table->tinyInteger('Editor');
            $table->tinyInteger('Visualizar');

            $table->foreign('idRol')->references('idRol')->on('rol');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permisos');
    }
};
