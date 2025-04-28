<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController; //Importar controlador ClientController
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\UserController;

// ruta de la pagina principal
Route::get('/', function () {
    return view('welcome');
});
// ruta para mostrar lista de clientes
Route::get('/clients', [ClientController::class, 'index']);

Route::resource('raw-materials', RawMaterialController::class);
// ruta para el registro y el inicio de sesión
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
// Obtener todas las pizzas en los pedidos
Route::get('/order-pizzas', [OrderPizzaController::class, 'index']);
// Obtener una pizza específica de un pedido
Route::get('/order-pizzas/{orderPizza}', [OrderPizzaController::class, 'show']);
// Asignar una pizza a un pedido
Route::post('/order-pizzas', [OrderPizzaController::class, 'store']);
// Actualizar una pizza en un pedido
Route::put('/order-pizzas/{orderPizza}', [OrderPizzaController::class, 'update']);
// Eliminar una pizza de un pedido
Route::delete('/order-pizzas/{id}', [OrderPizzaController::class, 'destroy']);
