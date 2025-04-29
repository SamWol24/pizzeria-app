@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Ingrediente Extra</h1>

    <div class="mb-3">
        <strong>Nombre:</strong> {{ $extraIngredient->name }}
    </div>

    <div class="mb-3">
        <strong>Precio:</strong> ${{ number_format($extraIngredient->price, 2) }}
    </div>

    <a href="{{ route('extra-ingredients.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('extra-ingredients.edit', $extraIngredient) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
