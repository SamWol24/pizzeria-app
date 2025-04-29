@extends('layouts.app')

@section('title', 'Agregar Ingrediente Extra a Pizza')

@section('content')
    <h1>Agregar Ingrediente Extra</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('order_extra_ingredient.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="order_pizza_id" class="form-label">Pizza en Pedido</label>
            <select name="order_pizza_id" class="form-control" required>
                <option value="">Seleccione una pizza</option>
                @foreach ($orderPizzas as $pizza)
                    <option value="{{ $pizza->id }}">#{{ $pizza->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="extra_ingredient_id" class="form-label">Ingrediente Extra</label>
            <select name="extra_ingredient_id" class="form-control" required>
                <option value="">Seleccione un ingrediente</option>
                @foreach ($extraIngredients as $ingredient)
                    <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="quantity" class="form-control" required min="1">
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('order_extra_ingredient.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
