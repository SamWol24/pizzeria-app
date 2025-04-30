@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id">Usuario</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $client->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="address" class="form-control" value="{{ $client->address }}" required>
        </div>

        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{ $client->phone }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
