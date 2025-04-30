@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de la Sucursal</h1>

    <p><strong>Nombre:</strong> {{ $branch->name }}</p>
    <p><strong>Ubicación:</strong> {{ $branch->location }}</p>

    <a href="{{ route('branches.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
