<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rol', function (Blueprint $table) {
            $table->increments('idRol');
            $table->string('Nombre', 20);
            $table->string('Descripcion', 200);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rol');
    }
};
