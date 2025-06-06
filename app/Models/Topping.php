<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'price',
        'type', 
    ];
    
    public function orderItemToppings()
    {
        return $this->hasMany(OrderItemTopping::class);
    }
}
