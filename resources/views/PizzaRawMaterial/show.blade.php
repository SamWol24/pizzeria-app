@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de Asignación</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pizza: {{ $pizzaRawMaterial->pizza->name ?? 'Sin nombre' }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Materia Prima: {{ $pizzaRawMaterial->rawMaterial->name ?? 'Sin nombre' }}</h6>
            <p class="card-text">Cantidad: {{ $pizzaRawMaterial->quantity }}</p>

            <a href="{{ route('pizza_raw_materials.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
