<?php

namespace App\Http\Controllers;

use App\Models\OrderPizza;
use Illuminate\Http\Request;

class OrderPizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las pizzas en los pedidos
        $orderPizzas = OrderPizza::all();
        return response()->json($orderPizzas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Asignar una pizza a un pedido
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'pizza_size_id' => 'required|exists:pizza_sizes,id',
            'quantity' => 'required|numeric',
        ]);

        $orderPizza = OrderPizza::create($validated);
        return response()->json($orderPizza, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderPizza $orderPizza)
    {
        // Mostrar una pizza en un pedido específico
        return response()->json($orderPizza);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderPizza $orderPizza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderPizza $orderPizza)
    {
        // Actualizar una pizza en un pedido
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'pizza_size_id' => 'required|exists:pizza_sizes,id',
            'quantity' => 'required|numeric',
        ]);

        $orderPizza->update($validated);
        return response()->json($orderPizza);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar una pizza de un pedido
        $orderPizza = OrderPizza::findOrFail($id);
        $orderPizza->delete();
        return response()->json(['message' => 'Pizza removed from order']);
    }
}
