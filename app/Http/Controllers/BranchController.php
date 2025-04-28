<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar todas las sucursales.
        $branches = Branch::all();
        return response()->json($branches);
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
        // crear una nueva sucursal
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $branch = Branch::create($validated);
        return response()->json($branch, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Mostrar una sucursal específica
        $branch = Branch::findOrFail($id);
        return response()->json($branch);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Actualizar los datos de una sucursal existente
        $branch = Branch::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $branch->update($validated);
        return response()->json($branch);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // eliminar una sucursal
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return response()->json(['message' => 'Branch deleted successfully']);
    }
}
