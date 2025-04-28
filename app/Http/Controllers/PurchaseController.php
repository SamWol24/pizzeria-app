<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las compras
        $purchases = Purchase::with(['supplier', 'rawMaterial'])->get();
        return response()->json($purchases);
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
        // Crear una nueva compra
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        $purchase = Purchase::create($validated);
        return response()->json($purchase, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Mostrar una compra específica
        $purchase = Purchase::with(['supplier', 'rawMaterial'])->findOrFail($id);
        return response()->json($purchase);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Actualizar una compra existente
        $purchase = Purchase::findOrFail($id);

        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'purchase_date' => 'required|date',
        ]);

        $purchase->update($validated);
        return response()->json($purchase);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar una compra
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return response()->json(['message' => 'Purchase deleted successfully']);
    }
}
