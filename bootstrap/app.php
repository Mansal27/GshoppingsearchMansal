<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// Configuración de la aplicación de Laravel
return Application::configure(basePath: dirname(__DIR__)) // Configura la aplicación con la ruta base del proyecto
    ->withRouting( //Configura las rutas para la aplicación
        web: __DIR__.'/../routes/web.php', //Especifica el archivo de rutas web
        commands: __DIR__.'/../routes/console.php', //Especifica el archivo de rutas de consola
        health: '/up', //Especifica la ruta para la verificación del estado de salud de la aplicación
    )
    ->withMiddleware(function (Middleware $middleware) { // Configura los middlewares para la aplicación
        // Aquí puedes añadir middlewares adicionales, si es necesario
    })
    ->withExceptions(function (Exceptions $exceptions) { // Configura el manejo de excepciones para la aplicación
        // Aquí puedes personalizar el manejo de excepciones, si es necesario
    })
    ->withCommands([ // Configura los comandos de consola para la aplicación
        \App\Console\Commands\SearchCommand::class, // Añade el comando SearchCommand, sin esta adicion no funcionaria el comando
    ])
    ->create(); // Crea y devuelve la instancia de la aplicación configurada
