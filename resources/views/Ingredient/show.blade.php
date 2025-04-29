@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Ingrediente #{{ $ingredient->id }}</h1>

    <p><strong>Nombre:</strong> {{ $ingredient->name }}</p>
    <p><strong>Precio adicional:</strong> ${{ number_format($ingredient->price, 2) }}</p>

    <a href="{{ route('ingredients.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
