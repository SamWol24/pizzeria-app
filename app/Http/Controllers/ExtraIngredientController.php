<?php

namespace App\Http\Controllers;

use App\Models\ExtraIngredient;
use Illuminate\Http\Request;

class ExtraIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mostrar todos los ingredientes extras disponibles
        $extras = ExtraIngredient::all();
        return response()->json($extras);
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
        // crear un nuevo ingrediente extra
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $extra = ExtraIngredient::create($validated);
        return response()->json($extra, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // mostrar ingrediente extra especifico
        $extra = ExtraIngredient::findOrFail($id);
        return response()->json($extra);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExtraIngredient $extraIngredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // actualizar ingrediente extra existente
        $extra = ExtraIngredient::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $extra->update($validated);
        return response()->json($extra);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // eliminar un ingrediente extra
        $extra = ExtraIngredient::findOrFail($id);
        $extra->delete();
        return response()->json(['message' => 'Extra ingredient deleted successfully']);
    }
}
