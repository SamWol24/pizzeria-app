@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Asignación</h1>

    <form action="{{ route('pizza_raw_materials.update', $pizzaRawMaterial) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="pizza_id" class="form-label">Pizza</label>
            <select name="pizza_id" id="pizza_id" class="form-control">
                @foreach($pizzas as $pizza)
                    <option value="{{ $pizza->id }}" {{ $pizzaRawMaterial->pizza_id == $pizza->id ? 'selected' : '' }}>
                        {{ $pizza->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="raw_material_id" class="form-label">Materia Prima</label>
            <select name="raw_material_id" id="raw_material_id" class="form-control">
                @foreach($rawMaterials as $material)
                    <option value="{{ $material->id }}" {{ $pizzaRawMaterial->raw_material_id == $material->id ? 'selected' : '' }}>
                        {{ $material->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="quantity" class="form-control" value="{{ $pizzaRawMaterial->quantity }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('pizza_raw_materials.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
