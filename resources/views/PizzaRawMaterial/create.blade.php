@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Asignación</h1>

    <form action="{{ route('pizza_raw_materials.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="pizza_id" class="form-label">Pizza</label>
            <select name="pizza_id" id="pizza_id" class="form-control">
                @foreach($pizzas as $pizza)
                    <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="raw_material_id" class="form-label">Materia Prima</label>
            <select name="raw_material_id" id="raw_material_id" class="form-control">
                @foreach($rawMaterials as $material)
                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('pizza_raw_materials.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
