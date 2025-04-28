<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Obtener todos los ingredientes
         $ingredients = Ingredient::all();
         return response()->json($ingredients);
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
         // Crear un nuevo ingrediente
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $ingredient = Ingredient::create($validated);
        return response()->json($ingredient, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtener un ingrediente específico
        $ingredient = Ingredient::findOrFail($id);
        return response()->json($ingredient);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Actualizar un ingrediente
        $ingredient = Ingredient::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $ingredient->update($validated);
        return response()->json($ingredient);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar un ingrediente
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        return response()->json(['message' => 'Ingredient deleted successfully']);
    }
}
