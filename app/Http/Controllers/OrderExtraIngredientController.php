<?php

namespace App\Http\Controllers;

use App\Models\OrderExtraIngredient;
use App\Models\OrderPizza;
use App\Models\ExtraIngredient;
use Illuminate\Http\Request;

class OrderExtraIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderExtraIngredients = OrderExtraIngredient::with('extraIngredient')->get();
        return view('order_extra_ingredient.index', compact('orderExtraIngredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orderPizzas = OrderPizza::all();
        $extraIngredients = ExtraIngredient::all();
        return view('order_extra_ingredient.create', compact('orderPizzas', 'extraIngredients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_pizza_id' => 'required|exists:order_pizzas,id',
            'extra_ingredient_id' => 'required|exists:extra_ingredients,id',
            'quantity' => 'required|integer|min:1',
        ]);

        OrderExtraIngredient::create($validated);

        return redirect()->route('order_extra_ingredient.index')->with('success', 'Ingrediente extra agregado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $orderExtraIngredient = OrderExtraIngredient::findOrFail($id);
        $orderPizzas = OrderPizza::all();
        $extraIngredients = ExtraIngredient::all();

        return view('order_extra_ingredient.edit', compact('orderExtraIngredient', 'orderPizzas', 'extraIngredients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'order_pizza_id' => 'required|exists:order_pizzas,id',
            'extra_ingredient_id' => 'required|exists:extra_ingredients,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $orderExtraIngredient = OrderExtraIngredient::findOrFail($id);
        $orderExtraIngredient->update($validated);

        return redirect()->route('order_extra_ingredient.index')->with('success', 'Ingrediente extra actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $orderExtraIngredient = OrderExtraIngredient::findOrFail($id);
        $orderExtraIngredient->delete();

        return redirect()->route('order_extra_ingredient.index')->with('success', 'Ingrediente extra eliminado correctamente');
    }
}
