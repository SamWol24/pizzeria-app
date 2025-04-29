@extends('layouts.app')

@section('content')
<h1>{{ $pizza->name }}</h1>

<p><strong>Descripción:</strong> {{ $pizza->description }}</p>
<p><strong>Precio:</strong> ${{ $pizza->price }}</p>
<p><strong>Tamaño:</strong> {{ $pizza->pizzaSize->name ?? 'Sin tamaño' }}</p>
<p><strong>Ingredientes:</strong>
    @foreach($pizza->ingredients as $ingredient)
        {{ $ingredient->name }}{{ !$loop->last ? ',' : '' }}
    @endforeach
</p>

<a href="{{ route('pizzas.index') }}" class="btn btn-secondary">Volver al listado</a>
@endsection
