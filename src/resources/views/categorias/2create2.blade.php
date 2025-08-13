@extends('layouts.tailwind')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Crear nueva categoría</h2>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Errores de validación --}}
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="nombre" class="block font-semibold">Nombre de la categoría</label>
            <input type="text" name="nombre" id="nombre"
                   class="w-full border-gray-300 rounded p-2 focus:outline-none focus:ring focus:border-blue-300"
                   required>
        </div>

        <div class="text-right">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection
