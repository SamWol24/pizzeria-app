@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Ingrediente Extra</h1>

    <form action="{{ route('extra-ingredients.update', $extraIngredient) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $extraIngredient->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ $extraIngredient->price }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('extra-ingredients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
