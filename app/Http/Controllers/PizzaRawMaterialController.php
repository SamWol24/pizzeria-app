<?php

namespace App\Http\Controllers;

use App\Models\PizzaRawMaterial;
use App\Models\Pizza;
use App\Models\RawMaterial;
use Illuminate\Http\Request;

class PizzaRawMaterialController extends Controller
{
    /**
     * Mostrar lista de pizza_raw_materials.
     */
    public function index()
    {
        $pizzaRawMaterials = PizzaRawMaterial::with('pizza', 'rawMaterial')->get();
        return view('pizza_raw_materials.index', compact('pizzaRawMaterials'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        $pizzas = Pizza::all();
        $rawMaterials = RawMaterial::all();
        return view('pizza_raw_materials.create', compact('pizzas', 'rawMaterials'));
    }

    /**
     * Guardar nuevo recurso en base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric',
        ]);

        PizzaRawMaterial::create($validated);

        return redirect()->route('pizza_raw_materials.index')->with('success', 'Asignación creada exitosamente.');
    }

    /**
     * Mostrar detalles de un recurso específico.
     */
    public function show(PizzaRawMaterial $pizzaRawMaterial)
    {
        return view('pizza_raw_materials.show', compact('pizzaRawMaterial'));
    }

    /**
     * Mostrar formulario para editar un recurso existente.
     */
    public function edit(PizzaRawMaterial $pizzaRawMaterial)
    {
        $pizzas = Pizza::all();
        $rawMaterials = RawMaterial::all();
        return view('pizza_raw_materials.edit', compact('pizzaRawMaterial', 'pizzas', 'rawMaterials'));
    }

    /**
     * Actualizar un recurso en la base de datos.
     */
    public function update(Request $request, PizzaRawMaterial $pizzaRawMaterial)
    {
        $validated = $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric',
        ]);

        $pizzaRawMaterial->update($validated);

        return redirect()->route('pizza_raw_materials.index')->with('success', 'Asignación actualizada exitosamente.');
    }

    /**
     * Eliminar un recurso específico.
     */
    public function destroy(PizzaRawMaterial $pizzaRawMaterial)
    {
        $pizzaRawMaterial->delete();
        return redirect()->route('pizza_raw_materials.index')->with('success', 'Asignación eliminada exitosamente.');
    }
}
