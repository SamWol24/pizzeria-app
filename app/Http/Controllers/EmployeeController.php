<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
        // Crear un nuevo empleado
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'branch_id' => 'required|exists:branches,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $employee = Employee::create($validated);
        return response()->json($employee, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        // Mostrar un empleado específico
        return response()->json($employee->load(['branch', 'user']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        // Actualizar un empleado
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'branch_id' => 'required|exists:branches,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $employee->update($validated);
        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
         // Eliminar un empleado
         $employee->delete();
         return response()->json(['message' => 'Employee deleted successfully']);
    }
}
