<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'encuesta';
    protected $primaryKey = 'idEncuesta';
    public $timestamps = false;

    protected $fillable = [
        'FechaCreacion',
        'Estado',
        'Soporte',
        'NivelSocioeconomico',
    ];

    public function novedades()
    {
        return $this->hasMany(Novedad::class, 'idEncuesta', 'idEncuesta');
    }

    public function nucleosFamiliares()
    {
        return $this->hasMany(NucleoFamiliar::class, 'idEncuesta', 'idEncuesta');
    }
}
