<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NucleoFamiliar extends Model
{
    use HasFactory;

    protected $table = 'nucleofamiliar';
    protected $primaryKey = 'idNucleoFamiliar';
    public $timestamps = false;

    protected $fillable = [
        'idUsuario',
        'idEncuesta',
        'JefeHogar',
    ];
}