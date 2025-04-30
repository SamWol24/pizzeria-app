@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Clientes</h1>

    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Nuevo Cliente</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->user->name ?? 'Sin usuario' }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>
                        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $clients->links() }}
</div>
@endsection
