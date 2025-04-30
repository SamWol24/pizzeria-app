<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Muestra la lista de sucursales.
     */
    public function index()
    {
        $branches = Branch::all();
        return view('branches.index', compact('branches'));
    }

    /**
     * Muestra el formulario de creación.
     */
    public function create()
    {
        return view('branches.create');
    }

    /**
     * Guarda una nueva sucursal.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        Branch::create($validated);
        return redirect()->route('branches.index')->with('success', 'Sucursal creada exitosamente.');
    }

    /**
     * Muestra una sucursal específica.
     */
    public function show(Branch $branch)
    {
        return view('branches.show', compact('branch'));
    }

    /**
     * Muestra el formulario de edición.
     */
    public function edit(Branch $branch)
    {
        return view('branches.edit', compact('branch'));
    }

    /**
     * Actualiza una sucursal.
     */
    public function update(Request $request, Branch $branch)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $branch->update($validated);
        return redirect()->route('branches.index')->with('success', 'Sucursal actualizada exitosamente.');
    }

    /**
     * Elimina una sucursal.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index')->with('success', 'Sucursal eliminada correctamente.');
    }
}

