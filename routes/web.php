<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderPizzaController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PizzaSizeController;
use App\Http\Controllers\OrderExtraIngredientController;
use App\Http\Controllers\ExtraIngredientController;
use App\Http\Controllers\PurchaseController;

// Ruta de la página principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas de Clientes
Route::get('/clients', [ClientController::class, 'index']);

// Rutas de Materias Primas (Raw Materials)
Route::resource('raw-materials', RawMaterialController::class);

// Rutas de Usuarios
// Registrar nuevo usuario
Route::post('/register', [UserController::class, 'register']);
// Iniciar sesión
Route::post('/login', [UserController::class, 'login']);

// Rutas de usuarios: listar, mostrar, actualizar y eliminar
Route::get('users', [UserController::class, 'index']); // Mostrar todos los usuarios
Route::get('users/{id}', [UserController::class, 'show']); // Mostrar un usuario específico
Route::put('users/{id}', [UserController::class, 'update']); // Actualizar un usuario
Route::delete('users/{id}', [UserController::class, 'destroy']); // Eliminar un usuario

// Rutas de Pizzas
Route::resource('pizzas', PizzaController::class);

// Rutas de Pedidos (Orders)
Route::resource('orders', OrderController::class);

// Rutas para sucursales (Branches)
Route::resource('branches', BranchController::class);

// Rutas para proveedores (Suppliers)
Route::resource('suppliers', SupplierController::class);

// Rutas para ingredientes (Ingredients)
Route::resource('ingredients', IngredientController::class);

// Rutas para tamaños de pizza (Pizza Sizes)
Route::resource('pizza-sizes', PizzaSizeController::class);

// Rutas para Extras en un Pedido (OrderExtraIngredient)
Route::resource('order-extra-ingredients', OrderExtraIngredientController::class);

// Rutas para Ingredientes Extras (ExtraIngredient)
Route::resource('extra-ingredients', ExtraIngredientController::class);

Route::resource('purchases', PurchaseController::class);

// Rutas para manejar las pizzas en pedidos (OrderPizzas)
Route::prefix('order-pizzas')->group(function () {
    Route::get('/', [OrderPizzaController::class, 'index']);
    Route::get('/{orderPizza}', [OrderPizzaController::class, 'show']);
    Route::post('/', [OrderPizzaController::class, 'store']);
    Route::put('/{orderPizza}', [OrderPizzaController::class, 'update']);
    Route::delete('/{orderPizza}', [OrderPizzaController::class, 'destroy']);
});
