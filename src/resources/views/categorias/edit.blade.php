@extends('layouts.tailwind')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Editar categoría</h2>

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre" class="block font-semibold">Nombre de la categoría</label>
            <input type="text" name="nombre" id="nombre"
                   class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
                   value="{{ old('nombre', $categoria->nombre) }}" required>
        </div>
        <div>
            <label for="descripcion" class="block font-semibold">Descripción de la categoría</label>
            <input type="text" name="descripcion" id="descripcion"
                   class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
                   value="{{ old('descripcion', $categoria->descripcion) }}">
        </div>
        <div class="text-right">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection
