<?php

namespace App\Http\Controllers;

use App\Models\PizzaSize;
use Illuminate\Http\Request;

class PizzaSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los tamaños de pizza
        $sizes = PizzaSize::all();
        return view('pizza_sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario para crear un nuevo tamaño de pizza
        return view('pizza_sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'size' => 'required|string|max:50',
            'price_modifier' => 'required|numeric',
        ]);

        // Crear nuevo tamaño
        PizzaSize::create($validated);

        // Redirigir a la lista con mensaje
        return redirect()->route('pizza_sizes.index')->with('success', 'Tamaño de pizza creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pizzaSize = PizzaSize::findOrFail($id);
        return view('pizza_sizes.show', compact('pizzaSize'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PizzaSize $pizzaSize)
    {
        return view('pizza_sizes.edit', compact('pizzaSize'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pizzaSize = PizzaSize::findOrFail($id);

        // Validar
        $validated = $request->validate([
            'size' => 'required|string|max:50',
            'price_modifier' => 'required|numeric',
        ]);

        // Actualizar
        $pizzaSize->update($validated);

        return redirect()->route('pizza_sizes.index')->with('success', 'Tamaño de pizza actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pizzaSize = PizzaSize::findOrFail($id);
        $pizzaSize->delete();

        return redirect()->route('pizza_sizes.index')->with('success', 'Tamaño de pizza eliminado correctamente.');
    }
}

