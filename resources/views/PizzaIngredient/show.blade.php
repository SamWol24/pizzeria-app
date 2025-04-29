@extends('layouts.app')

@section('title', 'Detalle de Ingrediente Asignado')

@section('content')
<h1>Detalle de Asignación</h1>

<ul>
    <li>Pizza: {{ $pizzaIngredient->pizza->name ?? 'N/A' }}</li>
    <li>Ingrediente: {{ $pizzaIngredient->ingredient->name ?? 'N/A' }}</li>
</ul>

<a href="{{ route('pizza_ingredients.index') }}" class="btn btn-secondary">Volver</a>
@endsection
