<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPizza extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'pizza_size_id', 'quantity'];

    // Relación con Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relación con PizzaSize
    public function pizzaSize()
    {
        return $this->belongsTo(PizzaSize::class);
    }
}

