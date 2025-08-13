@extends('layouts.tailwind')

@section('content')

<h2>Categorías</h2>

@foreach($categorias as $categoria)
    <h3>{{ $categoria->id }}</h3>
    <h3>{{ $categoria->nombre }}</h3>
    <p>{{ $categoria->descripcion }}</p>
     <a href="{{ route('categorias.edit', $categoria->id) }}"
        class="inline-block bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
        Editar
    </a>
@endforeach
@endsection
