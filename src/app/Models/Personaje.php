<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    protected $fillable = [
        'nombre',
        'foto_publica_path',
        'foto_privada_path',
    ];
}
