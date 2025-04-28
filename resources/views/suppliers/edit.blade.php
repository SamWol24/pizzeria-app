@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Proveedor: {{ $supplier->name }}</h1>
        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $supplier->name }}" required>
            </div>
            <div class="form-group">
                <label for="contact_email">Email</label>
                <input type="email" name="contact_email" class="form-control" id="contact_email" value="{{ $supplier->contact_email }}" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Teléfono</label>
                <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ $supplier->phone_number }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
