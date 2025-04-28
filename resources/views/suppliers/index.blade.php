@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Proveedores</h1>
        <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-3">Agregar Proveedor</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->contact_email }}</td>
                        <td>{{ $supplier->phone_number }}</td>
                        <td>
                            <a href="{{ route('suppliers.show', $supplier->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
