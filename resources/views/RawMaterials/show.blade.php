@extends('layouts.app')

@section('content')
    <h1>Materia Prima: {{ $rawMaterial->name }}</h1>
    <p><strong>Costo:</strong> {{ $rawMaterial->cost }}</p>
    <p><strong>Proveedor:</strong> {{ $rawMaterial->supplier->name }}</p>
    <a href="{{ route('raw-materials.index') }}" class="btn btn-secondary">Volver</a>
@endsection
