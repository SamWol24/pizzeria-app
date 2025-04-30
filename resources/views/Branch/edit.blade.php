@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Sucursal</h1>

    <form action="{{ route('branches.update', $branch) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Nombre</label>
            <input type="text" name="name" value="{{ $branch->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="location">Ubicación</label>
            <input type="text" name="location" value="{{ $branch->location }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('branches.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
