@extends('layouts.app')

@section('title', 'Editar Empleado')

@section('content')
    <h1>Editar Empleado</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @method('PUT')
        @include('employees._form')
    </form>
@endsection
