@extends('layouts.app')

@section('title', 'Crear Empleado')

@section('content')
    <h1>Crear Empleado</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">
        @include('employees._form')
    </form>
@endsection
