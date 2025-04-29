@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Pedido</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Cliente</label>
            <select name="client_id" class="form-control" required>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $order->client_id ? 'selected' : '' }}>{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Empleado</label>
            <select name="employee_id" class="form-control">
                <option value="">-- Seleccionar --</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $employee->id == $order->employee_id ? 'selected' : '' }}>{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Total</label>
            <input type="number" step="0.01" name="total" class="form-control" value="{{ $order->total }}" required>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <input type="text" name="status" class="form-control" value="{{ $order->status }}" required>
        </div>

        <button class="btn btn-primary">Actualizar Pedido</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
