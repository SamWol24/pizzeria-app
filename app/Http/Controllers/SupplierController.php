<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los proveedores
        $suppliers = Supplier::all();
        return response()->json($suppliers);
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
        // Validación de los datos del proveedor
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        // Crear un nuevo proveedor
        $supplier = Supplier::create($validated);

        // Retornar la respuesta con el proveedor recién creado
        return response()->json($supplier, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Mostrar un proveedor específico
        $supplier = Supplier::findOrFail($id);
        return response()->json($supplier);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar el proveedor a actualizar
        $supplier = Supplier::findOrFail($id);

        // Validación de los datos del proveedor
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email,' . $supplier->id,
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        // Actualizar el proveedor con los nuevos datos
        $supplier->update($validated);

        // Retornar la respuesta con el proveedor actualizado
        return response()->json($supplier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar y eliminar el proveedor
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        // Retornar mensaje de éxito
        return response()->json(['message' => 'Supplier deleted successfully']);
    }
}
