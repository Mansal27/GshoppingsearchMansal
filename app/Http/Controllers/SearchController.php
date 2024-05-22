<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan; 
use Illuminate\Http\Request;



/**
 * Controlador de búsqueda
 */
class SearchController extends Controller
{
   /**
    * Muestra el formulario de búsqueda
    *
    * @return \Illuminate\View\View La vista del formulario de búsqueda
    */
   public function showSearchForm()
   {
       // Renderiza la vista 'searching'
       return view('searching');
   }

   /**
    * Maneja la solicitud de búsqueda
    *
    * @param \Illuminate\Http\Request $request La solicitud HTTP
    * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View Redirige al formulario con un error o muestra los resultados
    */
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