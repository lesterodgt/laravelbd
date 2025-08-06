<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // Permitir asignación masiva
    protected $fillable = ['nombre', 'descripcion'];
    // Relación: Una categoría tiene muchos productos
    public function productos()    {
        return $this->hasMany(Producto::class);
    }

}
