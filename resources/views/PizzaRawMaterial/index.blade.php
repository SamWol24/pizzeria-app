@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Asignaciones de Materias Primas a Pizzas</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pizza_raw_materials.create') }}" class="btn btn-primary mb-3">Nueva Asignación</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pizza</th>
                <th>Materia Prima</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pizzaRawMaterials as $item)
                <tr>
                    <td>{{ $item->pizza->name ?? 'Sin nombre' }}</td>
                    <td>{{ $item->rawMaterial->name ?? 'Sin nombre' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <a href="{{ route('pizza_raw_materials.show', $item) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('pizza_raw_materials.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('pizza_raw_materials.destroy', $item) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
