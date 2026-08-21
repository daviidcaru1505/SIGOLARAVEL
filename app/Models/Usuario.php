<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'idUsuario';
    public $timestamps = false;

    protected $fillable = [
        'idRol',
        'Tipo',
        'TipoDocumento',
        'NumDocumento',
        'Nombre',
        'Apellido',
        'Telefono',
        'Correo',
        'Direccion',
        'Estado',
        'Contrasena',
    ];

    protected $hidden = [
        'Contrasena',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idRol', 'idRol');
    }

    public function nucleosFamiliares()
    {
        return $this->hasMany(NucleoFamiliar::class, 'idUsuario', 'idUsuario');
    }
}
