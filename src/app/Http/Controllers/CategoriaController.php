<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()     {
        // Cargar todas las categorías con sus productos
        $categorias = Categoria::with('productos')->get();
        return view('categorias.index', compact('categorias'));
    }
}
