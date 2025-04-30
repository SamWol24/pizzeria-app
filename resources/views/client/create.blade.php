@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Cliente</h1>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="user_id">Usuario</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="address" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
