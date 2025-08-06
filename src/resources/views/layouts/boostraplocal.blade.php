<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laravel')</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container mt-4">
        <h1 class="text-primary">@yield('header', 'Hola Laravel con Bootstrap')</h1>
    </div>

    <main class="container my-4">
        @yield('contenido')
    </main>

    <!-- Bootstrap JS y Popper.js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
