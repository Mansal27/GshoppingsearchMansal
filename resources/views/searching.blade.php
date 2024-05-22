<!-- resources/views/searching.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <!-- Define el tipo de documento como HTML5 -->
    <title>Buscar Producto</title>
    <!-- Define el título de la página como "Buscar Producto" -->
</head>
<body>
    <!-- Comienza el cuerpo del documento HTML -->
    <h1>Buscar Producto</h1>
    <!-- Encabezado principal de la página -->

    <!-- Verifica si hay un mensaje de error en la sesión -->
    @if (session('error'))
        <!-- Si hay un mensaje de error, lo muestra en un párrafo con texto rojo -->
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <!-- Formulario para buscar un producto -->
    <form action="{{ route('search') }}" method="POST">
        <!-- Directiva Blade para generar un token CSRF oculto para la protección contra ataques CSRF -->
        @csrf
        <!-- Etiqueta para el campo de entrada de texto -->
        <label for="query">Nombre, referencia y/o SKU del producto:</label>
        <!-- Campo de entrada de texto para el término de búsqueda -->
        <!-- `old('query', $query ?? '')` recupera el valor anterior del campo 'query' o el valor de $query si está disponible -->
        <input type="text" id="query" name="query" value="{{ old('query', $query ?? '') }}" required>
        <!-- Botón para enviar el formulario -->
        <button type="submit">Buscar</button>
    </form>

    <!-- Verifica si la variable $offers_url está definida -->
    @isset($offers_url)
        <!-- Si $offers_url está definida, muestra los resultados de la búsqueda -->
        <h2>Resultados de la Búsqueda</h2>
        <!-- Muestra un párrafo con la etiqueta en negrita "URL de ofertas:" y un enlace que abre en una nueva pestaña -->
        <p><strong>URL de ofertas:</strong> <a href="{{ $offers_url }}" target="_blank">{{ $offers_url }}</a></p>

        <!-- Verifica si $product_id no está vacío -->
        @if ($product_id)
            <!-- Si $product_id no está vacío, muestra el ID del producto -->
            <p><strong>ID del producto en "La Casa del Electrodoméstico":</strong> {{ $product_id }}</p>
        @else
            <!-- Si $product_id está vacío, muestra un mensaje indicando que no se encontró un ID de producto -->
            <p>No se encontró un ID de producto en "La Casa del Electrodoméstico".</p>
        @endif
    @endisset
    <!-- Finaliza la verificación de si $offers_url está definida -->
</body>
</html>
