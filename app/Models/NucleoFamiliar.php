<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NucleoFamiliar extends Model
{
    protected $table = 'nucleofamiliar';
    protected $primaryKey = 'idNucleoFamiliar';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idNucleoFamiliar',
        'idUsuario',
        'idEncuesta',
        'JefeHogar',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }

    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class, 'idEncuesta', 'idEncuesta');
    }
}
