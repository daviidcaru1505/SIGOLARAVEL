<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        Rol::firstOrCreate(['idRol' => 1], [
            'Nombre' => 'Asesor',
            'Descripcion' => 'Usuario encargado de gestionar encuestas y usuarios.',
        ]);

        Rol::firstOrCreate(['idRol' => 2], [
            'Nombre' => 'Encuestado',
            'Descripcion' => 'Usuario que responde encuestas del sistema SIGO.',
        ]);
    }
}
