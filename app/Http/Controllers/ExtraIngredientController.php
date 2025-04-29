<?php

namespace App\Http\Controllers;

use App\Models\ExtraIngredient;
use Illuminate\Http\Request;

class ExtraIngredientController extends Controller
{
    public function index()
    {
        $extraIngredients = ExtraIngredient::all();
        return view('extra_ingredients.index', compact('extraIngredients'));
    }

    public function create()
    {
        return view('extra_ingredients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        ExtraIngredient::create($validated);
        return redirect()->route('extra-ingredients.index')->with('success', 'Ingrediente extra creado correctamente.');
    }

    public function show(ExtraIngredient $extraIngredient)
    {
        return view('extra_ingredients.show', compact('extraIngredient'));
    }

    public function edit(ExtraIngredient $extraIngredient)
    {
        return view('extra_ingredients.edit', compact('extraIngredient'));
    }

    public function update(Request $request, ExtraIngredient $extraIngredient)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $extraIngredient->update($validated);
        return redirect()->route('extra-ingredients.index')->with('success', 'Ingrediente extra actualizado correctamente.');
    }

    public function destroy(ExtraIngredient $extraIngredient)
    {
        $extraIngredient->delete();
        return redirect()->route('extra-ingredients.index')->with('success', 'Ingrediente extra eliminado correctamente.');
    }
}
