<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PizzaSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',     // Ejemplo: Pequeña, Mediana, Grande
        'price_modifier', // Valor adicional o factor para el precio según el tamaño
    ];

    /**
     * Relación: un tamaño puede tener muchas pizzas.
     */
    public function pizzas(): HasMany
    {
        return $this->hasMany(Pizza::class);
    }
}
