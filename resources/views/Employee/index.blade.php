@extends('layouts.app')

@section('title', 'Listado de Empleados')

@section('content')
    <h1>Empleados</h1>

    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Nuevo Empleado</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Cargo</th>
                <th>Salario</th>
                <th>Sucursal</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>${{ number_format($employee->salary, 2) }}</td>
                    <td>{{ $employee->branch->name ?? 'N/A' }}</td>
                    <td>{{ $employee->user->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este empleado?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
