<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los pedidos
        $orders = Order::with(['user', 'orderPizzas.pizzaSize'])->get();
        return response()->json($orders);
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
         // Crear un nuevo pedido
         $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'employee_id' => 'nullable|exists:employees,id',
            'total' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        $order = Order::create($validated);
        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Mostrar un pedido específico, incluyendo relaciones de cliente y empleado
        return response()->json($order->load(['client', 'employee']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        // Mostrar un pedido específico para editar
        return response()->json($order->load(['client', 'employee']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        // Actualizar el pedido con nuevos datos
        $validated = $request->validate([
            'total' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        $order->update($validated);
        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        // Eliminar un pedido
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully']);
    }
}
