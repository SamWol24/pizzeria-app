<!-- resources/views/purchases/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Compra</h1>

        <table class="table">
            <tr>
                <th>Proveedor</th>
                <td>{{ $purchase->supplier->name }}</td>
            </tr>
            <tr>
                <th>Materia Prima</th>
                <td>{{ $purchase->rawMaterial->name }}</td>
            </tr>
            <tr>
                <th>Cantidad</th>
                <td>{{ $purchase->quantity }}</td>
            </tr>
            <tr>
                <th>Precio de Compra</th>
                <td>{{ $purchase->purchase_price }}</td>
            </tr>
            <tr>
                <th>Fecha de Compra</th>
                <td>{{ $purchase->purchase_date }}</td>
            </tr>
        </table>

        <a href="{{ route('purchases.index') }}" class="btn btn-primary">Volver a la lista</a>
    </div>
@endsection
