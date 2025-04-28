@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Proveedor: {{ $supplier->name }}</h1>
        <p>Email: {{ $supplier->contact_email }}</p>
        <p>Teléfono: {{ $supplier->phone_number }}</p>
        <a href="{{ route('suppliers.index') }}" class="btn btn-primary">Regresar</a>
    </div>
@endsection
