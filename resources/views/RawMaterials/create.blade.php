@extends('layouts.app')

@section('content')
    <h1>Crear Materia Prima</h1>
    <form action="{{ route('raw-materials.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cost">Costo</label>
            <input type="number" id="cost" name="cost" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="supplier_id">Proveedor</label>
            <select id="supplier_id" name="supplier_id" class="form-control" required>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
