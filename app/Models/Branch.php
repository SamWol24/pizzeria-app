<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',
        'location',
    ];

    /**
     * Relación de una sucursal con muchos empleados.
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * Relación de una sucursal con muchos pedidos (orders).
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
