@extends('layouts.app')

@section('title', 'Asignar Ingrediente a Pizza')

@section('content')
<h1>Asignar Ingrediente a Pizza</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pizza_ingredients.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="pizza_id" class="form-label">Pizza</label>
        <select name="pizza_id" id="pizza_id" class="form-control">
            @foreach($pizzas as $pizza)
                <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="ingredient_id" class="form-label">Ingrediente</label>
        <select name="ingredient_id" id="ingredient_id" class="form-control">
            @foreach($ingredients as $ingredient)
                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Asignar</button>
</form>
@endsection
