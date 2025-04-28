<!-- resources/views/purchases/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Compras</h1>

        <a href="{{ route('purchases.create') }}" class="btn btn-primary">Registrar Nueva Compra</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Proveedor</th>
                    <th>Materia Prima</th>
                    <th>Cantidad</th>
                    <th>Precio de Compra</th>
                    <th>Fecha de Compra</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->supplier->name }}</td>
                        <td>{{ $purchase->rawMaterial->name }}</td>
                        <td>{{ $purchase->quantity }}</td>
                        <td>{{ $purchase->purchase_price }}</td>
                        <td>{{ $purchase->purchase_date }}</td>
                        <td>
                            <a href="{{ route('purchases.show', $purchase->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('purchases.edit', $purchase->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta compra?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
