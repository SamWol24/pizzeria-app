<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',
        'email',
        'position',
        'salary',
        'branch_id', // Lo agregamos para la relación a branch (aunque no está en tu migración aún)
        'user_id',   // Lo agregamos para la relación a user (aunque no está en tu migración aún)
    ];

    /**
     * Relación de un empleado con su sucursal (branch).
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Relación de un empleado con su usuario.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
