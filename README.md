# Proyecto Laravel - Evaluación Técnica para Desarrollador Web


## Descripción

1. Aplicación web desarrollada en Laravel, en la cuál puede buscarse un producto utilizando Google custom search API, y te muestra su id y el Link de su compra en https://www.lacasadelelectrodomestico.com.


## Requisitos

- PHP >= 8.2.4
- Laravel 11
- Composer
- Google Custom Search API Key
- Google Custom Search Engine ID (CX)

## Configuración
## Crear un Custom Search Engine en Google ahí obtendra credenciales que usará mas adelante
1. https://programmablesearchengine.google.com/
2. Presionara el boton "GET STARTED. 
3. Tendrá que iniciar sesion para poder crear un Custom search Api y generar la key

### Clonar el Repositorio

Clona este repositorio en tu máquina local:

1. git clone https://github.com/Mansal27/GshoppingsearchMansal.git
2. cd nombre-del-repositorio 


## Configuracion del entorno
## Instalar dependencias desde la terminal de VScode
1. composer install 

## Configurar Variables de Entorno
## Se necesita copiar el .env.example y posteriormente se debe cambiar su nombre a .env, se puede hacer con el siguiente comando en la terminal
1. cp .env.example .env

2. Abrir el archivo .env y configurar las siguientes variables de entorno
   Reemplza 'tu_api_key_de_google' y 'tu_custom_search_engine_id' Por tus variales de entorno correspondientes
3. GOOGLE_CUSTOM_SEARCH_JSON_API_KEY=tu_api_key_de_google 
4. GOOGLE_CX=tu_custom_search_engine_id

## Genera la clave de la aplicacion
php artisan key:generate

## Crear la base de datos, daría error si no se crea antes.
## Le preguntara por la base de datos o bd, debe seleccionar 'Si' cuando
php artisan migrate



## Inicia el Servidor de desarrollo
php artisan serve

## Acceder a la app
http://localhost:8000

## Verás un formulario donde puedes ingresar el nombre, referencia o SKU de un producto para buscar. Los resultados de la búsqueda se mostrarán en la misma página.

## Para efectos de ejemplo usar en el campo del buscador
1. "lavadora Hisense WFQY701418VJM"
2. Acceda al Link
