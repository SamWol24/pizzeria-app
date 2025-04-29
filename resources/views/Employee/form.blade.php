@csrf

<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $employee->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="email" class="form-label">Correo Electrónico</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $employee->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="position" class="form-label">Cargo</label>
    <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $employee->position ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="salary" class="form-label">Salario</label>
    <input type="number" step="0.01" name="salary" id="salary" class="form-control" value="{{ old('salary', $employee->salary ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="branch_id" class="form-label">Sucursal</label>
    <select name="branch_id" id="branch_id" class="form-select" required>
        <option value="">-- Seleccione una Sucursal --</option>
        @foreach($branches as $branch)
            <option value="{{ $branch->id }}" {{ old('branch_id', $employee->branch_id ?? '') == $branch->id ? 'selected' : '' }}>
                {{ $branch->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="user_id" class="form-label">Usuario</label>
    <select name="user_id" id="user_id" class="form-select" required>
        <option value="">-- Seleccione un Usuario --</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ old('user_id', $employee->user_id ?? '') == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
<a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
