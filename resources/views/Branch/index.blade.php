@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Sucursales</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('branches.create') }}" class="btn btn-primary mb-3">Crear nueva sucursal</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($branches as $branch)
                <tr>
                    <td>{{ $branch->name }}</td>
                    <td>{{ $branch->location }}</td>
                    <td>
                        <a href="{{ route('branches.show', $branch) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('branches.edit', $branch) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('branches.destroy', $branch) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
