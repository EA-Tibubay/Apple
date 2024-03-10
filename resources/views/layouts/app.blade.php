<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <body>

    <div class="header">
        <h1>Apple</h1>
    </div>

    <div class="navbar">
        <a href="{{ route('products.index') }}">Productos</a>
        <a href="{{ route('sale_details.index') }}">Detalles de Venta</a>
        <a href="{{ route('sales.index') }}">Ventas</a>
    </div>

    <div class="container">
        <div class="content">
            @yield('content')
        </div>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} Apple. Todos los derechos reservados.
    </div>

</body>

</body>
</html>
