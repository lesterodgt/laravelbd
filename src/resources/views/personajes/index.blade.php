@php use Illuminate\Support\Facades\Storage; @endphp
@extends('layouts.tailwind')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Personajes</h1>
        <button data-modal-target="crearPersonajeModal" data-modal-toggle="crearPersonajeModal"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Nuevo Producto
        </button>
    </div>

    @if(session('ok'))
      <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg">
        {{ session('ok') }}
      </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Nombre</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Foto pública</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Foto privada</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
            @forelse($personajes as $personaje)
                <tr>
                    <td class="px-4 py-3 text-sm text-gray-800">{{ $personaje->nombre }}</td>
                    <td class="px-4 py-3">
                        @if($personaje->foto_publica_path)
                            <img src="{{ Storage::disk('public')->url($personaje->foto_publica_path) }}"
                                 alt="foto pública"
                                 class="h-14 w-14 object-cover rounded-lg border border-gray-200">
                        @else
                            <span class="text-xs text-gray-500">Sin foto</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        @if($personaje->foto_privada_path)
                            <a href="{{ route('personajes.fotoPrivada', $personaje) }}"
                               class="text-blue-600 hover:underline text-sm">Descargar</a>
                        @else
                            <span class="text-xs text-gray-500">No disponible</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('personajes.edit', $personaje) }}"
                           class="inline-flex items-center px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm">
                           Editar
                        </a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-4 py-6 text-center text-gray-500">Aún no hay personajes.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('personajes._form', [ 'datoacompartir' => 'hola', 'personaje'=>new \App\Models\Personaje() ])

@endsection
