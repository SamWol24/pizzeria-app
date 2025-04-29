@extends('layouts.app')

@section('title', 'Ingredientes Extra por Pizza')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Ingredientes Extra por Pizza</h1>
        <a href="{{ route('order_extra_ingredient.create') }}" class="btn btn-primary">Agregar Ingrediente Extra</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pizza Pedido ID</th>
                <th>Ingrediente</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderExtraIngredients as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->order_pizza_id }}</td>
                    <td>{{ $item->extraIngredient->name ?? 'N/A' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        <a href="{{ route('order_extra_ingredient.edit', $item->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('order_extra_ingredient.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este ingrediente extra?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
