<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaRawMaterial extends Model
{
    use HasFactory;

    protected $fillable = ['pizza_id', 'raw_material_id', 'quantity'];

    // Relación con Pizza
    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }

    // Relación con RawMaterial
    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterial::class);
    }
}
