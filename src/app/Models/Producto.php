<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Permitir asignación masiva
    protected $fillable = ['nombre', 'precio', 'stock', 'categoria_id'];
    // Relación: Un producto pertenece a una categoría
    public function categoria()    {
        return $this->belongsTo(Categoria::class);
    }
}
