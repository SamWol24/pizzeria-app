@extends('layouts.app')

@section('content')
    <h1>Lista de Tamaños de Pizza</h1>

    <a href="{{ route('pizza_sizes.create') }}">Crear nuevo tamaño</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tamaño</th>
                <th>Modificador de Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sizes as $size)
                <tr>
                    <td>{{ $size->id }}</td>
                    <td>{{ $size->size }}</td>
                    <td>{{ $size->price_modifier }}</td>
                    <td>
                        <a href="{{ route('pizza_sizes.show', $size) }}">Ver</a> |
                        <a href="{{ route('pizza_sizes.edit', $size) }}">Editar</a> |
                        <form action="{{ route('pizza_sizes.destroy', $size) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro que deseas eliminarlo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
