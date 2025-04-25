<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController; //Importar controlador ClientController

// ruta de la pagina principal
Route::get('/', function () {
    return view('welcome');
});
// ruta para mostrar lista de clientes
Route::get('/clients', [ClientController::class, 'index']);