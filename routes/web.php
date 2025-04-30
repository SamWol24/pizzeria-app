<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//  Rutas por rol
Route::middleware(['auth', 'role:administrador'])->get('/admin', function () {
    return 'Bienvenido, Administrador';
});

Route::middleware(['auth', 'role:cajero'])->get('/cajero', function () {
    return 'Bienvenido, Cajero';
});

Route::middleware(['auth', 'role:cocinero'])->get('/cocinero', function () {
    return 'Bienvenido, Cocinero';
});

Route::middleware(['auth', 'role:mensajero'])->get('/mensajero', function () {
    return 'Bienvenido, Mensajero';
});

Route::middleware(['auth', 'role:cliente'])->get('/cliente', function () {
    return 'Bienvenido, Cliente';
});

// Ruta de prueba para login rápido (elimina en producción)
Route::get('/login-test', function () {
    $user = \App\Models\User::first();
    Auth::login($user);
    return redirect('/dashboard');
});
// Rutas de productos (accesibles solo si estás autenticado)
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});

// Rutas de pedidos
Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
});

require __DIR__.'/auth.php';
