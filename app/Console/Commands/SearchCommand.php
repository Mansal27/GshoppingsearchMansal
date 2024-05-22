<?php
// app/Console/Commands/SearchCommand.php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class SearchCommand extends Command
{
    protected $signature = 'search:product {query}';
    protected $description = 'Buscar un producto en Google y obtener información de La Casa del Electrodoméstico';

     // Método principal que se ejecuta cuando se llama al Command
     public function handle()
     {
         // Obtiene la consulta de búsqueda
         $query = $this->argument('query');
         $apiKey = config('services.google.api_key'); // Obtiene la API Key de la configuración
         $cx = config('services.google.cx'); // Obtiene el CX de la configuración o el ID del custom search engine
 
         // Crea una nueva instancia del cliente HTTP
         $client = new Client();
         // Construye la URL de la API de Google Custom Search
         $url = "https://www.googleapis.com/customsearch/v1?q=" . urlencode($query) . "&key={$apiKey}&cx={$cx}";
 
         try {
             // Realiza la solicitud GET a la API de Google
             $response = $client->get($url);
             // Decodifica la respuesta JSON
             $results = json_decode($response->getBody()->getContents(), true);
 
             // Variables para almacenar los resultados deseados
             $offersUrl = '';
             $productId = '';
             $productLink = '';
 
             // Itera sobre los resultados de búsqueda
             foreach ($results['items'] as $item) {
                 // Busca el enlace de ofertas de Google Shopping
                 if (strpos($item['link'], 'google.com/shopping/product/') !== false) {
                     $offersUrl = explode('?', $item['link'])[0]; // Obtiene la URL hasta /offers
                 }
                 // Busca el enlace de La Casa del Electrodoméstico
                 if (strpos($item['link'], 'lacasadelelectrodomestico.com') !== false) {
                     preg_match('/IDArticulo~(\d+)/', $item['link'], $matches);
                     if (isset($matches[1])) {
                         $productId = $matches[1];
                         $productLink = $item['link']; // Guarda el enlace del producto
                     }
                 }
             }
 
             // Muestra los resultados en formato JSON
             $this->info(json_encode([
                 'offers_url' => $offersUrl,
                 'product_id' => $productId,
                 'product_link' => $productLink,
             ]));
         } catch (\Exception $e) {
             // Muestra un mensaje de error si ocurre una excepción
             $this->error('Error: ' . $e->getMessage());
         }
 
         return 0;
     }
}
