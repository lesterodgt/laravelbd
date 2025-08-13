@php use Illuminate\Support\Facades\Storage; @endphp

<div id="crearPersonajeModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-300">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-blue">
                    Nuevo Producto {{$datoacompartir}}
                </h3>
                <button type="button" data-modal-hide="crearPersonajeModal"
                    class="text-gray-400 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                    ✕
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-4 space-y-4">

                <h1 class="text-2xl font-bold text-gray-800 mb-6">
                    {{ $personaje->exists ? 'Editar personaje' : 'Nuevo personaje' }}
                </h1>

                <form
                    action="{{ $personaje->exists ? route('personajes.update', $personaje) : route('personajes.store') }}"
                    method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if ($personaje->exists)
                        @method('PUT')
                    @endif

                    {{-- Nombre --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                        <input type="text" name="nombre" value="{{ old('nombre', $personaje->nombre) }}" required
                            class="w-full rounded-lg border border-gray-500 px-3 py-2 focus:ring focus:border-blue-300">
                        @error('nombre')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Foto pública --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Foto pública</label>
                        <input type="file" name="foto_publica" accept="image/*"
                            class="w-full rounded-lg border border-gray-500 px-3 py-2 focus:ring focus:border-blue-300">
                        @error('foto_publica')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror

                        @if ($personaje->exists && $personaje->foto_publica_path)
                            <div class="mt-3">
                                <p class="text-xs text-gray-500 mb-1">Actual:</p>
                                <img src="{{ Storage::disk('public')->url($personaje->foto_publica_path) }}"
                                    alt="actual pública" class="h-20 w-20 object-cover rounded-lg border">
                            </div>
                        @endif
                    </div>

                    {{-- Foto privada --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Foto privada</label>
                        <input type="file" name="foto_privada" accept="image/*"
                            class="w-full rounded-lg border border-gray-500 px-3 py-2 focus:ring focus:border-blue-300">
                        @error('foto_privada')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror

                        @if ($personaje->exists && $personaje->foto_privada_path)
                            <div class="mt-3">
                                <p class="text-xs text-gray-500 mb-1">Actual: (descarga)</p>
                                <a href="{{ route('personajes.fotoPrivada', $personaje) }}"
                                    class="inline-flex items-center text-blue-600 hover:underline text-sm">Descargar
                                    foto privada</a>
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('personajes.index') }}"
                            class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700">Cancelar</a>

                        <button type="submit"
                            class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold">
                            {{ $personaje->exists ? 'Actualizar' : 'Crear' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
