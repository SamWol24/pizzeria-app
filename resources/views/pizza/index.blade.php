@extends('layouts.app')

@section('title', 'Lista de Pizzas')

@section('content')
    <h1 class="mb-4">Listado de Pizzas</h1>

    <a href="{{ route('pizzas.create') }}" class="btn btn-primary mb-3">Agregar Nueva Pizza</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Tamaño</th>
                <th>Ingredientes</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pizzas as $pizza)
                <tr>
                    <td>{{ $pizza->name }}</td>
                    <td>{{ $pizza->description }}</td>
                    <td>${{ $pizza->price }}</td>
                    <td>{{ $pizza->pizzaSize->name }}</td>
                    <td>
                        @foreach ($pizza->ingredients as $ingredient)
                            <span class="badge bg-secondary">{{ $ingredient->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('pizzas.edit', $pizza->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta pizza?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
