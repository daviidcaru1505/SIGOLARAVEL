<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';
    protected $primaryKey = 'idPermisos';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idPermisos',
        'idRol',
        'Editor',
        'Visualizar',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idRol', 'idRol');
    }
}
