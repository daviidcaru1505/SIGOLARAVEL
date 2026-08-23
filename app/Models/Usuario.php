<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

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

    // Relación con el Modelo Rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idRol', 'idRol');
    }

    // Relación con Encuesta
    public function encuesta()
    {
        return $this->hasOne(Encuesta::class, 'idUsuario', 'idUsuario');
    }
}