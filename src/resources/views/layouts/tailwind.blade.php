<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel con Tailwind')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-600 text-gray-900">

    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-2xl font-bold">@yield('header', 'Bienvenido a Laravel con Tailwind')</h1>
    </header>

    <main class="container mx-auto p-6">
        @yield('content')
    </main>

</body>
</html>
