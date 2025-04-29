@extends('layouts.app')

@section('title', 'Editar Asignación de Ingrediente')

@section('content')
<h1>Editar Asignación de Ingrediente</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pizza_ingredients.update', $pizzaIngredient->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="pizza_id" class="form-label">Pizza</label>
        <select name="pizza_id" id="pizza_id" class="form-control">
            @foreach($pizzas as $pizza)
                <option value="{{ $pizza->id }}" {{ $pizza->id == $pizzaIngredient->pizza_id ? 'selected' : '' }}>
                    {{ $pizza->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="ingredient_id" class="form-label">Ingrediente</label>
        <select name="ingredient_id" id="ingredient_id" class="form-control">
            @foreach($ingredients as $ingredient)
                <option value="{{ $ingredient->id }}" {{ $ingredient->id == $pizzaIngredient->ingredient_id ? 'selected' : '' }}>
                    {{ $ingredient->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Actualizar</button>
</form>
@endsection
