@extends('layouts.app')

@section('content')
    <h1>Lista de Materias Primas</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Costo</th>
                <th>Proveedor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rawMaterials as $rawMaterial)
                <tr>
                    <td>{{ $rawMaterial->name }}</td>
                    <td>{{ $rawMaterial->cost }}</td>
                    <td>{{ $rawMaterial->supplier->name }}</td>
                    <td>
                        <a href="{{ route('raw-materials.show', $rawMaterial->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('raw-materials.edit', $rawMaterial->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('raw-materials.destroy', $rawMaterial->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('raw-materials.create') }}" class="btn btn-primary">Crear Materia Prima</a>
@endsection
