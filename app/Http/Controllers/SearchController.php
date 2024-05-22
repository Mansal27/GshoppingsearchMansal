<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan; 
use Illuminate\Http\Request;



class SearchController extends Controller
{
   // Método para mostrar el formulario de búsqueda
   public function showSearchForm()
   {
       // Renderiza la vista 'searching'
       return view('searching');
   }

   // Método para manejar la solicitud de búsqueda
   public function search(Request $request)
   {
       // Obtiene la consulta de búsqueda del formulario
       $query = $request->input('query');

       // Verifica si la consulta está vacía
       if (empty($query)) {
           // Redirige al formulario con un mensaje de error
           return redirect()->route('search.form')->with('error', 'Por favor ingrese un término de búsqueda.');
       }

       // Llama al comando Artisan 'search:product' con la consulta
       Artisan::call('search:product', ['query' => $query]);

       // Obtiene la salida del comando y la decodifica como JSON
       $output = Artisan::output();
       $result = json_decode($output, true);

       // Renderiza la vista 'results' con los resultados de la búsqueda
       return view('results', [
           'offers_url' => $result['offers_url'] ?? '',
           'product_id' => $result['product_id'] ?? '',
           'product_link' => $result['product_link'] ?? '',
       ]);
   }
}
