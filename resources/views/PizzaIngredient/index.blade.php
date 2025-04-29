@extends('layouts.app')

@section('title', 'Ingredientes de Pizzas')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Ingredientes Asignados a Pizzas</h1>
    <a href="{{ route('pizza_ingredients.create') }}" class="btn btn-primary">Asignar Nuevo Ingrediente</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Pizza</th>
            <th>Ingrediente</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pizzaIngredients as $pi)
            <tr>
                <td>{{ $pi->id }}</td>
                <td>{{ $pi->pizza->name ?? 'N/A' }}</td>
                <td>{{ $pi->ingredient->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('pizza_ingredients.edit', $pi->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('pizza_ingredients.destroy', $pi->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Seguro de eliminar?')" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
