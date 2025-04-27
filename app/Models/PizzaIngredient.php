<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PizzaIngredient extends Pivot
{
    // Si en algún momento agregas más campos, puedes usarlos aquí
    protected $fillable = [
        'pizza_id', 'ingredient_id',
    ];
}
