<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    protected $table = 'novedades';
    protected $primaryKey = 'idNovedades';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idNovedades',
        'idEncuesta',
        'TipoNovedad',
        'Descripcion',
        'Fecha',
        'Estado',
    ];

    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class, 'idEncuesta', 'idEncuesta');
    }
}
