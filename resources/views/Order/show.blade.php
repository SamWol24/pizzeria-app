@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Pedido #{{ $order->id }}</h1>

    <p><strong>Cliente:</strong> {{ $order->client->name }}</p>
    <p><strong>Empleado:</strong> {{ $order->employee->name ?? 'No asignado' }}</p>
    <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
    <p><strong>Estado:</strong> {{ $order->status }}</p>

    <h4>Pizzas:</h4>
    <ul>
        @foreach ($order->pizzas as $pizza)
            <li>{{ $pizza->name }} - Cantidad: {{ $pizza->pivot->quantity }}</li>
        @endforeach
    </ul>

    <h4>Ingredientes Extra:</h4>
    <ul>
        @foreach ($order->extraIngredients as $ingredient)
            <li>{{ $ingredient->name }} - Cantidad: {{ $ingredient->pivot->quantity }}</li>
        @endforeach
    </ul>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
