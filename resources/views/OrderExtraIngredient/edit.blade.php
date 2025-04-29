@extends('layouts.app')

@section('title', 'Editar Ingrediente Extra')

@section('content')
    <h1>Editar Ingrediente Extra en Pizza</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('order_extra_ingredient.update', $orderExtraIngredient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="order_pizza_id" class="form-label">Pizza en Pedido</label>
            <select name="order_pizza_id" class="form-control" required>
                @foreach ($orderPizzas as $pizza)
                    <option value="{{ $pizza->id }}" {{ $pizza->id == $orderExtraIngredient->order_pizza_id ? 'selected' : '' }}>
                        #{{ $pizza->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="extra_ingredient_id" class="form-label">Ingrediente Extra</label>
            <select name="extra_ingredient_id" class="form-control" required>
                @foreach ($extraIngredients as $ingredient)
                    <option value="{{ $ingredient->id }}" {{ $ingredient->id == $orderExtraIngredient->extra_ingredient_id ? 'selected' : '' }}>
                        {{ $ingredient->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="quantity" class="form-control" value="{{ $orderExtraIngredient->quantity }}" required min="1">
        </div>

        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('order_extra_ingredient.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
