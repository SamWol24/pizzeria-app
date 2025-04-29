@extends('layouts.app')

@section('title', 'Agregar Pizza a Pedido')

@section('content')
    <h1>Agregar Pizza a Pedido</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('order_pizzas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="order_id" class="form-label">Pedido</label>
            <select name="order_id" id="order_id" class="form-control" required>
                <option value="">Seleccione un Pedido</option>
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pizza_size_id" class="form-label">Tamaño de Pizza</label>
            <select name="pizza_size_id" id="pizza_size_id" class="form-control" required>
                <option value="">Seleccione un Tamaño</option>
                @foreach ($pizzaSizes as $pizzaSize)
                    <option value="{{ $pizzaSize->id }}">{{ $pizzaSize->size }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('order_pizzas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
