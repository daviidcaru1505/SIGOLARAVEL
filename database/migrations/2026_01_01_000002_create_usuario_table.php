<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('idUsuario');
            $table->unsignedInteger('idRol')->nullable();
            $table->enum('Tipo', ['Asesor', 'Encuestado']);
            $table->enum('TipoDocumento', ['RC', 'TI', 'CC', 'PS', 'CE']);
            $table->string('NumDocumento', 10);
            $table->string('Nombre', 45);
            $table->string('Apellido', 45);
            $table->string('Telefono', 45);
            $table->string('Correo', 45);
            $table->string('Direccion', 45);
            $table->string('Estado', 45);
            $table->string('Contrasena', 255)->nullable();

            $table->foreign('idRol')->references('idRol')->on('rol');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
