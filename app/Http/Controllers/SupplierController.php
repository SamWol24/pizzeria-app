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
        // Retornar la vista con los proveedores
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario para crear un proveedor
        return view('suppliers.create');
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

        // Redirigir a la lista de proveedores con un mensaje de éxito
        return redirect()->route('suppliers.index')->with('success', 'Proveedor creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Mostrar un proveedor específico
        $supplier = Supplier::findOrFail($id);
        // Retornar la vista con el proveedor
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Buscar el proveedor a editar
        $supplier = Supplier::findOrFail($id);
        // Retornar la vista para editar el proveedor
        return view('suppliers.edit', compact('supplier'));
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

        // Redirigir a la lista de proveedores con un mensaje de éxito
        return redirect()->route('suppliers.index')->with('success', 'Proveedor actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar y eliminar el proveedor
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        // Redirigir a la lista de proveedores con un mensaje de éxito
        return redirect()->route('suppliers.index')->with('success', 'Proveedor eliminado exitosamente');
    }
}
