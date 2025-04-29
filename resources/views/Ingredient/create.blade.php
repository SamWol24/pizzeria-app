@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Ingrediente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('ingredients.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Precio Adicional</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>

        <button class="btn btn-success">Guardar Ingrediente</button>
        <a href="{{ route('ingredients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
