<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;


class CategoriaController extends Controller
{
    public function index()     {
        // Cargar todas las categorías con sus productos
        $categorias = Categoria::with('productos')->get();
        //session()->flash('success', 'El producto se procesó correctamente.');
        /*$mensajes = [
            'El nombre es obligatorio.',
            'El precio debe ser mayor que 0.',
            'Debe seleccionar una categoría.',
        ];

        session()->flash('errors', new MessageBag($mensajes));
        */
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        //session()->flash('success', 'hola.');
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3',
            'descripcion' => 'nullable|string|max:1000'
        ]);

        Categoria::create($request->only('nombre', 'descripcion'));

        return redirect()->route('categorias.create')->with('success', 'Categoría creada correctamente');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|min:3',
            'descripcion' => 'nullable|string|max:1000'
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->only('nombre', 'descripcion'));

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente');
    }
}
