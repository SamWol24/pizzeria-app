@extends('layouts.app')

@section('content')
    <h1>Detalle del Tamaño de Pizza</h1>

    <p><strong>ID:</strong> {{ $pizzaSize->id }}</p>
    <p><strong>Tamaño:</strong> {{ $pizzaSize->size }}</p>
    <p><strong>Modificador de Precio:</strong> {{ $pizzaSize->price_modifier }}</p>

    <a href="{{ route('pizza_sizes.edit', $pizzaSize) }}">Editar</a> |
    <a href="{{ route('pizza_sizes.index') }}">Volver</a>
@endsection
