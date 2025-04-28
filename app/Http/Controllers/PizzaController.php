<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\PizzaSize;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todas las pizzas con sus tamaños e ingredientes
        $pizzas = Pizza::with(['pizzaSize', 'ingredients'])->get();
        return response()->json($pizzas);
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
        // Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'pizza_size_id' => 'required|exists:pizza_sizes,id',
            'ingredient_ids' => 'nullable|array',  // Lista de IDs de ingredientes
        ]);

        // Crear la pizza
        $pizza = Pizza::create($validated);

        // Asignar los ingredientes a la pizza si se proporcionan
        if ($request->has('ingredient_ids')) {
            $pizza->ingredients()->sync($request->ingredient_ids);
        }
        return response()->json($pizza, 201);
    }

   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mostrar una pizza específica con su tamaño e ingredientes
        $pizza = Pizza::with(['pizzaSize', 'ingredients'])->findOrFail($id);
        return response()->json($pizza);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pizza $pizza)
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
        // Validar y actualizar los datos de la pizza
        $pizza = Pizza::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'pizza_size_id' => 'required|exists:pizza_sizes,id',
            'ingredient_ids' => 'nullable|array',
        ]);

        // Actualizar la pizza
        $pizza->update($validated);

        // Actualizar los ingredientes
        if ($request->has('ingredient_ids')) {
            $pizza->ingredients()->sync($request->ingredient_ids);
        }

        return response()->json($pizza);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar una pizza
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();
        return response()->json(['message' => 'Pizza deleted successfully']);
    }
}
