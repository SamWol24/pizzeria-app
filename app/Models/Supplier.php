<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_email',
        'phone_number',
    ];

    /**
     * Relación: un proveedor tiene muchas materias primas.
     */
    public function rawMaterials(): HasMany
    {
        return $this->hasMany(RawMaterial::class);
    }
}
