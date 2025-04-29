@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ingredientes Extras</h1>

    <a href="{{ route('extra-ingredients.create') }}" class="btn btn-primary mb-3">Agregar Ingrediente Extra</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($extraIngredients as $extra)
                <tr>
                    <td>{{ $extra->name }}</td>
                    <td>${{ number_format($extra->price, 2) }}</td>
                    <td>
                        <a href="{{ route('extra-ingredients.show', $extra) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('extra-ingredients.edit', $extra) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('extra-ingredients.destroy', $extra) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
