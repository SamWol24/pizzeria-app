<?php

namespace App\Http\Controllers;

use App\Models\OrderExtraIngredient;
use Illuminate\Http\Request;

class OrderExtraIngredientController extends Controller
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
        // agragar ingradiente extra a una orden
        $validated = $request->validate([
            'order_pizza_id' => 'required|exists:order_pizzas,id',
            'extra_ingredient_id' => 'required|exists:extra_ingredients,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $orderExtraIngredient = OrderExtraIngredient::create($validated);
        return response()->json($orderExtraIngredient, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderExtraIngredient $orderExtraIngredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderExtraIngredient $orderExtraIngredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderExtraIngredient $orderExtraIngredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $orderExtraIngredient = OrderExtraIngredient::findOrFail($id);
        $orderExtraIngredient->delete();
        return response()->json(['message' => 'Extra ingredient removed from order pizza']);
    }
}
