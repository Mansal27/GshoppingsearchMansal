<!DOCTYPE html>
<html>
<head>
    <!-- Define el tipo de documento como HTML5 -->
    <title>Resultados de la Búsqueda</title>
    <!-- Define el título de la página como "Resultados de la Búsqueda" -->
</head>
<body>
    <!-- Comienza el cuerpo del documento HTML -->
    <h1>Resultados de la Búsqueda</h1>
    <!-- Encabezado principal de la página -->

    <!-- Verifica si la variable $offers_url no está vacía -->
    @if (!empty($offers_url))
        <!-- Si $offers_url no está vacía, muestra la URL de ofertas -->
        <p><strong>URL de ofertas:</strong> <a href="{{ $offers_url }}" target="_blank">{{ $offers_url }}</a></p>
        <!-- Muestra un párrafo con la etiqueta en negrita "URL de ofertas:" y un enlace que abre en una nueva pestaña -->
    @else
        <!-- Si $offers_url está vacía, muestra un mensaje indicando que no se encontró una URL de ofertas -->
        <p>No se encontró una URL de ofertas.</p>
    @endif

    <!-- Verifica si la variable $product_id no está vacía -->
    @if (!empty($product_id))
        <!-- Si $product_id no está vacía, muestra el ID del producto -->
        <p><strong>ID del producto en "La Casa del Electrodoméstico":</strong> {{ $product_id }}</p>
        <!-- Muestra un párrafo con la etiqueta en negrita "ID del producto en 'La Casa del Electrodoméstico':" seguido del ID del producto -->
    @else
        <!-- Si $product_id está vacía, muestra un mensaje indicando que no se encontró un ID de producto -->
        <p>No se encontró un ID de producto en "La Casa del Electrodoméstico".</p>
    @endif

    <!-- Verifica si la variable $product_link no está vacía -->
    @if (!empty($product_link))
        <!-- Si $product_link no está vacía, muestra el enlace del producto -->
        <p><strong>Enlace del producto:</strong> <a href="{{ $product_link }}" target="_blank">{{ $product_link }}</a></p>
        <!-- Muestra un párrafo con la etiqueta en negrita "Enlace del producto:" y un enlace que abre en una nueva pestaña -->
    @else
        <!-- Si $product_link está vacía, muestra un mensaje indicando que no se encontró un enlace del producto -->
        <p>No se encontró un enlace del producto en "La Casa del Electrodoméstico".</p>
    @endif

    <!-- Muestra un enlace para volver al formulario de búsqueda -->
    <a href="{{ route('search.form') }}">Volver a buscar</a>
    <!-- Enlace que redirige a la ruta 'search.form', que muestra el formulario de búsqueda -->
</body>
</html>
