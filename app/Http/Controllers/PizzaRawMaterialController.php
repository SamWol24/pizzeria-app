<?php

namespace App\Http\Controllers;

use App\Models\PizzaRawMaterial;
use Illuminate\Http\Request;

class PizzaRawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Asignar materia prima a una pizza
        $validated = $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric',
        ]);

        $pizzaRawMaterial = PizzaRawMaterial::create($validated);
        return response()->json($pizzaRawMaterial, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PizzaRawMaterial $pizzaRawMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PizzaRawMaterial $pizzaRawMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Actualizar cantidad de materia prima de una pizza
        $pizzaRawMaterial = PizzaRawMaterial::findOrFail($id);

        $validated = $request->validate([
            'quantity' => 'required|numeric',
        ]);

        $pizzaRawMaterial->update($validated);
        return response()->json($pizzaRawMaterial);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar una materia prima de una pizza
        $pizzaRawMaterial = PizzaRawMaterial::findOrFail($id);
        $pizzaRawMaterial->delete();
        return response()->json(['message' => 'Pizza raw material deleted successfully']);
    }
}
