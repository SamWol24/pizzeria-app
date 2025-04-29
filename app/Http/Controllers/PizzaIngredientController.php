<?php

namespace App\Http\Controllers;

use App\Models\PizzaIngredient;
use App\Models\Pizza;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class PizzaIngredientController extends Controller
{
    public function index()
    {
        $pizzaIngredients = PizzaIngredient::all();
        return view('pizza_ingredients.index', compact('pizzaIngredients'));
    }

    public function create()
    {
        $pizzas = Pizza::all();
        $ingredients = Ingredient::all();
        return view('pizza_ingredients.create', compact('pizzas', 'ingredients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        PizzaIngredient::create($validated);

        return redirect()->route('pizza_ingredients.index')->with('success', 'Ingrediente asignado correctamente');
    }

    public function show(PizzaIngredient $pizzaIngredient)
    {
        return view('pizza_ingredients.show', compact('pizzaIngredient'));
    }

    public function edit(PizzaIngredient $pizzaIngredient)
    {
        $pizzas = Pizza::all();
        $ingredients = Ingredient::all();
        return view('pizza_ingredients.edit', compact('pizzaIngredient', 'pizzas', 'ingredients'));
    }

    public function update(Request $request, PizzaIngredient $pizzaIngredient)
    {
        $validated = $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        $pizzaIngredient->update($validated);

        return redirect()->route('pizza_ingredients.index')->with('success', 'Asignación actualizada correctamente');
    }

    public function destroy($id)
    {
        $pizzaIngredient = PizzaIngredient::findOrFail($id);
        $pizzaIngredient->delete();

        return redirect()->route('pizza_ingredients.index')->with('success', 'Asignación eliminada correctamente');
    }
}
