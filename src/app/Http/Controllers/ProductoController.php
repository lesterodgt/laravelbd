<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::with('categoria')->get();

        $categorias = Categoria::all();

        return view('productos.index', compact('productos','categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3',
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Producto::create($request->only('nombre', 'precio', 'stock', 'categoria_id'));

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }

}
