@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Pedido</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Cliente</label>
            <select name="client_id" class="form-control" required>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Empleado (opcional)</label>
            <select name="employee_id" class="form-control">
                <option value="">-- Seleccionar --</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Total</label>
            <input type="number" step="0.01" name="total" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <input type="text" name="status" class="form-control" required>
        </div>

        <button class="btn btn-success">Guardar Pedido</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
