@extends('layouts.app')

@section('title', 'Lista de Pizzas en Pedidos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Pizzas en Pedidos</h1>
        <a href="{{ route('order_pizzas.create') }}" class="btn btn-primary">Agregar Pizza a Pedido</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pedido</th>
                <th>Tamaño de Pizza</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderPizzas as $orderPizza)
                <tr>
                    <td>{{ $orderPizza->id }}</td>
                    <td>#{{ $orderPizza->order->id ?? 'N/A' }}</td>
                    <td>{{ $orderPizza->pizzaSize->size ?? 'N/A' }}</td>
                    <td>{{ $orderPizza->quantity }}</td>
                    <td>
                        <a href="{{ route('order_pizzas.edit', $orderPizza) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('order_pizzas.destroy', $orderPizza) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta pizza del pedido?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
