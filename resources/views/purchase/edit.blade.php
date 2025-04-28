<!-- resources/views/purchases/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Compra</h1>

        <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="supplier_id">Proveedor</label>
                <select name="supplier_id" id="supplier_id" class="form-control" required>
                    <option value="">Seleccione un proveedor</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $purchase->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="raw_material_id">Materia Prima</label>
                <select name="raw_material_id" id="raw_material_id" class="form-control" required>
                    <option value="">Seleccione una materia prima</option>
                    @foreach ($rawMaterials as $rawMaterial)
                        <option value="{{ $rawMaterial->id }}" {{ $purchase->raw_material_id == $rawMaterial->id ? 'selected' : '' }}>{{ $rawMaterial->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Cantidad</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $purchase->quantity }}" required min="1">
            </div>

            <div class="form-group">
                <label for="purchase_price">Precio de Compra</label>
                <input type="number" name="purchase_price" id="purchase_price" class="form-control" value="{{ $purchase->purchase_price }}" required min="0" step="0.01">
            </div>

            <div class="form-group">
                <label for="purchase_date">Fecha de Compra</label>
                <input type="date" name="purchase_date" id="purchase_date" class="form-control" value="{{ $purchase->purchase_date->toDateString() }}" required>
            </div>

            <button type="submit" class="btn btn-warning mt-3">Actualizar Compra</button>
        </form>
    </div>
@endsection
