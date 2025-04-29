@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Pedidos</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Crear nuevo pedido</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Empleado</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->client->name }}</td>
                <td>{{ $order->employee->name ?? 'N/A' }}</td>
                <td>${{ number_format($order->total, 2) }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este pedido?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
