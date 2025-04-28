<?php

namespace App\Http\Controllers;

use App\Models\PizzaSize;
use Illuminate\Http\Request;

class PizzaSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los tamaños de pizza
        $sizes = PizzaSize::all();
        return response()->json($sizes);
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
        // Validar los datos del tamaño de pizza
        $validated = $request->validate([
            'size' => 'required|string|max:50',
            'price_modifier' => 'required|numeric',
        ]);

        // Crear un nuevo tamaño de pizza
        $size = PizzaSize::create($validated);
        return response()->json($size, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mostrar un tamaño específico de pizza
        $size = PizzaSize::findOrFail($id);
        return response()->json($size);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PizzaSize $pizzaSize)
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
        // Buscar y actualizar un tamaño de pizza existente
        $size = PizzaSize::findOrFail($id);

        // Validar los datos de la actualización
        $validated = $request->validate([
            'size' => 'required|string|max:50',
            'price_modifier' => 'required|numeric',
        ]);

        // Actualizar los datos del tamaño de pizza
        $size->update($validated);
        return response()->json($size);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar un tamaño de pizza
        $size = PizzaSize::findOrFail($id);
        $size->delete();
        return response()->json(['message' => 'Pizza size deleted successfully']);
    }
}
