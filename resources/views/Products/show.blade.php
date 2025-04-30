@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p><strong>Descripción:</strong> {{ $product->description }}</p>
    <p><strong>Precio:</strong> ${{ $product->price }}</p>
    <p><strong>Stock:</strong> {{ $product->stock }}</p>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
