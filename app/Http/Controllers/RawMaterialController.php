<?php
namespace App\Http\Controllers;

use App\Models\RawMaterial;
use App\Models\Supplier;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtener todas las materias primas y sus proveedores
        $materials = RawMaterial::with('supplier')->get();
        // Retornar la vista con los materiales
        return view('rawMaterials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Obtener todos los proveedores para mostrarlos en el formulario
        $suppliers = Supplier::all();
        // Retornar la vista para crear una nueva materia prima
        return view('rawMaterials.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar los datos para la nueva materia prima
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id', // Validar que el proveedor exista
        ]);

        // Crear la materia prima
        RawMaterial::create($validated);
        // Redirigir a la lista de materias primas con un mensaje de éxito
        return redirect()->route('raw-materials.index')->with('success', 'Materia prima creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Obtener la materia prima junto con su proveedor
        $material = RawMaterial::with('supplier')->findOrFail($id);
        // Retornar la vista con los detalles de la materia prima
        return view('rawMaterials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  RawMaterial  $rawMaterial
     * @return \Illuminate\View\View
     */
    public function edit(RawMaterial $rawMaterial)
    {
        // Obtener todos los proveedores para mostrarlos en el formulario
        $suppliers = Supplier::all();
        // Retornar la vista para editar la materia prima
        return view('rawMaterials.edit', compact('rawMaterial', 'suppliers'));
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
        // Buscar la materia prima que se desea actualizar
        $material = RawMaterial::findOrFail($id);

        // Validar los datos de la actualización
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id', // Validar que el proveedor exista
        ]);

        // Actualizar los datos de la materia prima
        $material->update($validated);
        // Redirigir a la lista de materias primas con un mensaje de éxito
        return redirect()->route('raw-materials.index')->with('success', 'Materia prima actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Buscar y eliminar la materia prima
        $material = RawMaterial::findOrFail($id);
        $material->delete();
        // Redirigir a la lista de materias primas con un mensaje de éxito
        return redirect()->route('raw-materials.index')->with('success', 'Materia prima eliminada exitosamente.');
    }
}
