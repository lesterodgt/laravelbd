<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel con Tailwind')</title>
    @vite('resources/css/app.css')
    <!-- En resources/views/layouts/app.blade.php -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Agrega esto en tu layout: -->
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>


</head>
<body class="bg-gray-600 text-gray-900">

    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-2xl font-bold">@yield('header', 'Bienvenido a Laravel con Tailwind')</h1>
    </header>

    <main class="container mx-auto p-6">


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
        @yield('content')
    </main>

</body>
</html>
