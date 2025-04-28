<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    /**
     * Relación: un pedido puede tener múltiples ingredientes extra.
     */
    public function extraIngredients(): BelongsToMany
    {
        return $this->belongsToMany(ExtraIngredient::class, 'order_extra_ingredients')
                    ->withPivot('quantity');
    }

    /**
     * Relación: un pedido puede tener múltiples pizzas.
     */
    public function pizzas(): BelongsToMany
    {
        return $this->belongsToMany(Pizza::class, 'order_pizzas')
                    ->withPivot('quantity');
    }
}
