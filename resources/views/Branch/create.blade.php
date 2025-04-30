@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Sucursal</h1>

    <form action="{{ route('branches.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="location">Ubicación</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('branches.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
