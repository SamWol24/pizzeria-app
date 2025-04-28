<?php

namespace App\Http\Controllers;

use App\Models\PizzaIngredient;
use Illuminate\Http\Request;

class PizzaIngredientController extends Controller
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
         // Asignar ingredientes a una pizza
         $validated = $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        $pizzaIngredient = PizzaIngredient::create($validated);
        return response()->json($pizzaIngredient, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PizzaIngredient $pizzaIngredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PizzaIngredient $pizzaIngredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PizzaIngredient $pizzaIngredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Eliminar un ingrediente de una pizza
        $pizzaIngredient = PizzaIngredient::findOrFail($id);
        $pizzaIngredient->delete();
        return response()->json(['message' => 'Pizza ingredient deleted successfully']);
    }
}
