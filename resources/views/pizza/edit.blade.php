@extends('layouts.app')

@section('title', 'Editar Pizza')

@section('content')
    <h1>Editar Pizza: {{ $pizza->name }}</h1>

    <form action="{{ route('pizzas.update', $pizza->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="name" required value="{{ old('name', $pizza->name) }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción:</label>
            <textarea class="form-control" name="description">{{ old('description', $pizza->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Precio:</label>
            <input type="number" class="form-control" name="price" step="0.01" required value="{{ old('price', $pizza->price) }}">
        </div>

        <div class="mb-3">
            <label for="pizza_size_id" class="form-label">Tamaño de Pizza:</label>
            <select class="form-control" name="pizza_size_id" required>
                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}" {{ $pizza->pizza_size_id == $size->id ? 'selected' : '' }}>
                        {{ $size->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="ingredient_ids" class="form-label">Ingredientes:</label>
            <select name="ingredient_ids[]" class="form-control" multiple>
                @foreach ($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}" 
                        {{ in_array($ingredient->id, $pizza->ingredients->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $ingredient->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('pizzas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
