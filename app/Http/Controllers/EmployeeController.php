<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Opcionalmente podrías listar todos los empleados aquí
        $employees = Employee::with(['branch', 'user'])->get();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        $users = User::all();
        return view('employees.create', compact('branches', 'users'));
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
        return redirect()->route('employees.index')->with('success', 'Empleado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $branches = Branch::all();
        $users = User::all();
        return view('employees.edit', compact('employee', 'branches', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'branch_id' => 'required|exists:branches,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $employee->update($validated);
        return redirect()->route('employees.index')->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Empleado eliminado correctamente.');
    }
}

