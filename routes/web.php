<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// Ruta principal que muestra el formulario de búsqueda
Route::get('/', [SearchController::class, 'showSearchForm'])->name('search.form');

// Ruta para manejar el envío del formulario de búsqueda
Route::post('/search', [SearchController::class, 'search'])->name('search');