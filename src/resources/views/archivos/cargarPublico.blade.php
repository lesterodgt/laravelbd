@extends('layouts.tailwind')

@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-300">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold text-gray-700 mb-6">Subir archivo PUBLICO</h1>

        <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-600 mb-2 font-medium">Seleccione un archivo:</label>
                <input type="file" name="archivo"
                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring focus:border-blue-300"
                       required>
                @error('archivo')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-400">
                Subir archivo
            </button>

            @if (session('path'))
                <div class="mt-4 p-3 bg-green-100 text-green-800 rounded-lg">
                    <p><strong>Guardado en:</strong> {{ session('path') }}</p>
                    <p>
                        <strong>URL pública:</strong>
                        <a href="{{ Storage::url(session('path')) }}" target="_blank" class="text-blue-600 underline">
                            {{ Storage::url(session('path')) }}
                        </a>
                    </p>
                </div>
            @endif
        </form>
    </div>
</div>

@endsection
