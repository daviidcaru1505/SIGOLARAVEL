<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    protected $table = 'encuesta';
    protected $primaryKey = 'idEncuesta';
    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
        'FechaCreacion',
        'Estado',
        'Soporte',
        'NivelSocioeconomico',
    ];

    /**
     * Relación con el usuario encuestado
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }
}