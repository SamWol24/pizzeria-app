<!-- resources/views/purchases/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registrar Nueva Compra</h1>

        <form action="{{ route('purchases.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="supplier_id">Proveedor</label>
                <select name="supplier_id" id="supplier_id" class="form-control" required>
                    <option value="">Seleccione un proveedor</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="raw_material_id">Materia Prima</label>
                <select name="raw_material_id" id="raw_material_id" class="form-control" required>
                    <option value="">Seleccione una materia prima</option>
                    @foreach ($rawMaterials as $rawMaterial)
                        <option value="{{ $rawMaterial->id }}">{{ $rawMaterial->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Cantidad</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
            </div>

            <div class="form-group">
                <label for="purchase_price">Precio de Compra</label>
                <input type="number" name="purchase_price" id="purchase_price" class="form-control" required min="0" step="0.01">
            </div>

            <div class="form-group">
                <label for="purchase_date">Fecha de Compra</label>
                <input type="date" name="purchase_date" id="purchase_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Registrar Compra</button>
        </form>
    </div>
@endsection
