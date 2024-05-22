<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */
    //Se configura el servicio de Google Custom Search para poder usarlo en el comando de búsqueda
    'google' => [
        // La API Key se obtiene de las variables de entorno. Esto asegura que las credenciales sensibles no se almacenen directamente en el código.
        'api_key' => env('GOOGLE_CUSTOM_SEARCH_JSON_API_KEY'),
          // El identificador de Custom Search Engine (CX) también se obtiene de las variables de entorno.
        'cx' => env('GOOGLE_CX'),
    ],


    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
