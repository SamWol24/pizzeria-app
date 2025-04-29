@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Ingredientes</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('ingredients.create') }}" class="btn btn-primary mb-3">Crear nuevo ingrediente</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio adicional</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ingredients as $ingredient)
            <tr>
                <td>{{ $ingredient->id }}</td>
                <td>{{ $ingredient->name }}</td>
                <td>${{ number_format($ingredient->price, 2) }}</td>
                <td>
                    <a href="{{ route('ingredients.show', $ingredient) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('ingredients.edit', $ingredient) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('ingredients.destroy', $ingredient) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este ingrediente?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
