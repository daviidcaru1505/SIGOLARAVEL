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
            $table->string('FechaCreacion', 45);
            $table->string('Estado', 45);
            $table->string('Soporte', 45);
            $table->string('NivelSocioeconomico', 3)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('encuesta');
    }
};
