<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'pizza_size_id',
    ];

    /**
     * Relación: una pizza pertenece a un tamaño.
     */
    public function pizzaSize(): BelongsTo
    {
        return $this->belongsTo(PizzaSize::class);
    }

    /**
     * Relación: una pizza tiene muchos ingredientes (relación muchos a muchos).
     */
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'pizza_ingredient')
                    ->withTimestamps();
    }

    /**
     * Relación: una pizza tiene muchas materias primas (relación muchos a muchos).
     */
    public function rawMaterials(): BelongsToMany
    {
        return $this->belongsToMany(RawMaterial::class, 'pizza_raw_material')
                    ->withTimestamps();
    }
}
