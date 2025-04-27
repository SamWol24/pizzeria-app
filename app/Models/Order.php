<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'employee_id',
        'total',
        'status',
    ];

    /**
     * Relación: un pedido pertenece a un cliente.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Relación: un pedido puede ser atendido por un empleado (opcional).
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
