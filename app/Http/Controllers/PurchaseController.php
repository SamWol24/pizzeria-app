<?php
namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\RawMaterial;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtener todas las compras y sus proveedores y materias primas asociadas
        $purchases = Purchase::with(['supplier', 'rawMaterial'])->get();
        // Retornar la vista con las compras
        return view('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Obtener todos los proveedores y materias primas disponibles para el formulario
        $suppliers = Supplier::all();
        $rawMaterials = RawMaterial::all();
        // Retornar la vista para crear una nueva compra
        return view('purchases.create', compact('suppliers', 'rawMaterials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar los datos para la nueva compra
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id', // Validar que el proveedor exista
            'raw_material_id' => 'required|exists:raw_materials,id', // Validar que la materia prima exista
            'quantity' => 'required|numeric|min:1',
            'purchase_price' => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
        ]);

        // Crear la compra
        Purchase::create($validated);
        // Redirigir a la lista de compras con un mensaje de éxito
        return redirect()->route('purchases.index')->with('success', 'Compra registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Obtener la compra específica con sus relaciones
        $purchase = Purchase::with(['supplier', 'rawMaterial'])->findOrFail($id);
        // Retornar la vista con los detalles de la compra
        return view('purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Purchase  $purchase
     * @return \Illuminate\View\View
     */
    public function edit(Purchase $purchase)
    {
        // Obtener todos los proveedores y materias primas disponibles para el formulario de edición
        $suppliers = Supplier::all();
        $rawMaterials = RawMaterial::all();
        // Retornar la vista para editar la compra
        return view('purchases.edit', compact('purchase', 'suppliers', 'rawMaterials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Buscar la compra a actualizar
        $purchase = Purchase::findOrFail($id);

        // Validar los datos de la actualización
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id', // Validar que el proveedor exista
            'raw_material_id' => 'required|exists:raw_materials,id', // Validar que la materia prima exista
            'quantity' => 'required|numeric|min:1',
            'purchase_price' => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
        ]);

        // Actualizar los datos de la compra
        $purchase->update($validated);
        // Redirigir a la lista de compras con un mensaje de éxito
        return redirect()->route('purchases.index')->with('success', 'Compra actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Buscar y eliminar la compra
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        // Redirigir a la lista de compras con un mensaje de éxito
        return redirect()->route('purchases.index')->with('success', 'Compra eliminada exitosamente.');
    }
}
