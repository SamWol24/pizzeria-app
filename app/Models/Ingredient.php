<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price', // precio adicional del ingrediente si aplica
    ];

    /**
     * Relación: un ingrediente puede estar en muchas pizzas (muchos a muchos).
     */
    public function pizzas(): BelongsToMany
    {
        return $this->belongsToMany(Pizza::class, 'pizza_ingredient');
    }
}
