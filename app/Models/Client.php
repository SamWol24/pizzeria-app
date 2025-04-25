<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    //definiendo que campos pueden ser llenados automaticamente
    protected $fillable = 
    [
        'user_id','address','phone'
    ];
    //definir la relación 1 a 1 (un cliente pertenece a un usuario)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    //definiendo relacion de 1 a muchos (1 cliente tiene muchos pedidos)
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
