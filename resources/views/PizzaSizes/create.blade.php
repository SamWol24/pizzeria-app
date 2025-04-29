@extends('layouts.app')

@section('content')
    <h1>Crear Tamaño de Pizza</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pizza_sizes.store') }}" method="POST">
        @csrf
        <label>Tamaño:</label>
        <input type="text" name="size" value="{{ old('size') }}" required><br><br>

        <label>Modificador de Precio:</label>
        <input type="number" step="0.01" name="price_modifier" value="{{ old('price_modifier') }}" required><br><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('pizza_sizes.index') }}">Volver</a>
@endsection
