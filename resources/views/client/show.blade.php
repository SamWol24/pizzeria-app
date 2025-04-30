@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Cliente</h1>

    <p><strong>ID:</strong> {{ $client->id }}</p>
    <p><strong>Usuario:</strong> {{ $client->user->name ?? 'Sin usuario' }}</p>
    <p><strong>Dirección:</strong> {{ $client->address }}</p>
    <p><strong>Teléfono:</strong> {{ $client->phone }}</p>

    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
