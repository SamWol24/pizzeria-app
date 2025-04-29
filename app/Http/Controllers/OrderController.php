<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['client', 'employee'])->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $employees = Employee::all();
        return view('orders.create', compact('clients', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'employee_id' => 'nullable|exists:employees,id',
            'total' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        $order = Order::create($validated);
        return redirect()->route('orders.index')->with('success', 'Pedido creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load(['client', 'employee', 'pizzas', 'extraIngredients']);
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $clients = Client::all();
        $employees = Employee::all();
        return view('orders.edit', compact('order', 'clients', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'employee_id' => 'nullable|exists:employees,id',
            'total' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Pedido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pedido eliminado correctamente');
    }
}
