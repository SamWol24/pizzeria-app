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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener materia prima
        $materials = RawMaterial::with('supplier')->get();
        return response()->json($materials);
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
        $material = RawMaterial::create($validated);
        return response()->json($material, 201);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mostrar una materia prima específica junto con su proveedor
        $material = RawMaterial::with('supplier')->findOrFail($id);
        return response()->json($material);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RawMaterial $rawMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        return response()->json($material);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscar y eliminar la materia prima
        $material = RawMaterial::findOrFail($id);
        $material->delete();
        return response()->json(['message' => 'Raw material deleted successfully']);
    }
}
