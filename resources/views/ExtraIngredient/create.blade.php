@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Ingrediente Extra</h1>

    <form action="{{ route('extra-ingredients.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('extra-ingredients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
