@extends('layouts.tailwind')

@section('content')

<h2>Categorías</h2>

@foreach($categorias as $categoria)
    <h3>{{ $categoria->id }}</h3>
    <h3>{{ $categoria->nombre }}</h3>
    <p>{{ $categoria->descripcion }}</p>
@endforeach
@endsection
